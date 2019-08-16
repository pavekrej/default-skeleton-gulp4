<?php
/**
 * FUNCTIONS
 */


/* --- Load configurations --- */

// Config
include_once 'application/config.php';

// Languages
include_once 'application/languages.php';

// Pages
include_once 'application/pages.php';


/* --- Initialization --- */

redirectToRelatedPage();
debugFunctions();


/* --- Redirect to related page --- */

function redirectToRelatedPage() {

    // Example of URL logic
    /*
    // Structure

    EN (defaultLanguage)
    - homepage (defaultPage) (defaultLanguagePage)
    - typography

    CS
    - uvod (defaultLanguagePage)
    - typografie

    // Redirections

    EN (defaultLanguage)
    http://www.domain.cz/
    http://www.domain.cz/homepage/          => http://www.domain.cz/
    http://www.domain.cz/en/                => http://www.domain.cz/
    http://www.domain.cz/en/typography/     => http://www.domain.cz/typography/
    http://www.domain.cz/en/404/            => http://www.domain.cz/404/

    CS
    http://www.domain.cz/cs/                => http://www.domain.cz/cs/uvod/
    http://www.domain.cz/cs/uvod/           => http://www.domain.cz/cs/uvod/
    http://www.domain.cz/cs/typografie/     => http://www.domain.cz/cs/typografie/
    http://www.domain.cz/cs/404/            => http://www.domain.cz/cs/404/

    404
    http://www.domain.cz/404/               => http://www.domain.cz/cs/404/
    http://www.domain.cz/404/404/           => http://www.domain.cz/cs/404/404/
    http://www.domain.cz/404/404/404...     => http://www.domain.cz/cs/404/
    */

    global $config;
    global $pages;
    $configDefaultLanguage = $config['defaultLanguage'];
    $configLanguages = $config['languages'];
    $configDefaultPage = $config['defaultPage'];
    $configPages = $pages;
    $showDebugMessages = false;

    $redirectLink = '';
    $getPage = (isset($_GET['page']) && ($_GET['page'] !== $configDefaultLanguage || isset($_GET['language']) && $_GET['page'] === $configDefaultLanguage)) ? urlencode($_GET['page']) : '';
    $getLanguage = (getLanguage() !== $configDefaultLanguage) ? getLanguage() : $configDefaultLanguage;

    // If is homepage
    if (empty($getPage) && $getLanguage === $configDefaultLanguage) {
        ($showDebugMessages) ? pp('redirectToRelatedPage: Page is homepage') : '';
        $redirectLink = '';
    }

    // If is set language or page
    if (!empty($getPage) && !isset($_GET['language'])) {
        ($showDebugMessages) ? pp('redirectToRelatedPage: Is set language or page') : '';
        if(array_key_exists($getPage, $configLanguages)) {
            ($showDebugMessages) ? pp('redirectToRelatedPage: Language exists') : '';
            foreach ($configPages[$getPage] as $page) {
                if (isset($page['defaultLanguagePage']) && $page['defaultLanguagePage']) {
                    ($showDebugMessages) ? pp('redirectToRelatedPage: Language default page') : '';
                    $redirectLink = $getPage . '/' . $page['slug'] . '/';
                    break 1;
                }
            }
        } else {
            ($showDebugMessages) ? pp('redirectToRelatedPage: Language doesn\'t exist') : '';
            $redirectLink = $getPage . '/';
            if($getPage === $configDefaultPage) {
                ($showDebugMessages) ? pp('redirectToRelatedPage: Page is homepage') : '';
                $redirectLink = '';
            }
        }
    }

    // If is set language and page
    if (!empty($getPage) && !empty($_GET['language'])) {
        ($showDebugMessages) ? pp('redirectToRelatedPage: Is set language and page') : '';
        if(array_key_exists($_GET['language'], $configLanguages)) {
            ($showDebugMessages) ? pp('redirectToRelatedPage: Language exists') : '';
            if(isset($configPages[$_GET['language']])) {
                if($_GET['language'] !== $configDefaultLanguage) {
                    // Info: page is 404 or exist
                    ($showDebugMessages) ? pp('redirectToRelatedPage: Language isn\'t as default') : '';
                    ($showDebugMessages) ? pp('redirectToRelatedPage: Page is 404 or exist') : '';
                    $redirectLink = urlencode($_GET['language']) . '/' . $getPage . '/';
                } else {
                    ($showDebugMessages) ? pp('redirectToRelatedPage: Language is as default') : '';
                    $redirectLink = urlencode($_GET['language']) . '/' . $getPage . '/';
                    if($getPage !== $configDefaultPage) {
                        foreach ($configPages[$_GET['language']] as $page) {
                            if ($page['slug'] === $getPage) {
                                ($showDebugMessages) ? pp('redirectToRelatedPage: Page exists') : '';
                                $redirectLink = $page['slug'] . '/';
                                break;
                            }
                        }
                    } else {
                        ($showDebugMessages) ? pp('redirectToRelatedPage: Page is homepage') : '';
                        $redirectLink = '';
                    }
                }
            }
        } else {
            ($showDebugMessages) ? pp('redirectToRelatedPage: Language doesn\'t exist') : '';
            $redirectLink = urlencode($_GET['language']) . '/' . $getPage . '/';
        }
    }
    $redirectLink = getThemeUrl() . $redirectLink;

    // If requested URL is different than real URL, redirect with 301 to real URL
    if (parse_url($_SERVER['REQUEST_URI'])['path'] !== $redirectLink) {
        if(!$showDebugMessages) {
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $redirectLink);
        }
    }
    ($showDebugMessages) ? pp('redirectToRelatedPage: ' . $redirectLink) : '';

    return $redirectLink;
}


/* --- Web settings --- */

// Get web domain
function getWebDomain() {
    global $config;
    return $config['domain'];
}

// Get web title
function getWebTitle() {
    return l('global', 'title-web');
}

// Get web author
function getWebAuthor() {
    return l('global', 'author');
}

// Get global language
function l($component, $text, $language = '') {
    global $languages;
    try {
        if(empty($languages[getLanguage()]) || (!empty($language) && empty($languages[$language]))) {
            throw new Exception('It is not defined global LANGUAGE');
        } else {
            $text = (!empty($language)) ? $languages[$language][$component][$text] : $languages[getLanguage()][$component][$text];
        }
    } catch(Exception $e) {
        echo "\n ", '<pre>' . $e->getMessage() . '</pre>';
    }
    return $text;
}


/* --- Theme settings --- */

// Get theme URL
function getThemeUrl() {
    global $config;
    return $config['themeUrl'];
}

// Get base URL
function getBaseUrl() {
    $hostName = $_SERVER['HTTP_HOST'];
    $protocol = strtolower(substr($_SERVER['SERVER_PROTOCOL'],0,5)) === 'https' ? 'https' : 'http';
    return $protocol . '://' . $hostName;
}


/* --- Pages settings --- */

// Get page id
function getPageId() {
    global $pages;
    global $config;
    $configDefaultPage = $config['defaultPage'];
    $configPages = $pages;

    $pageId = '';
    $getLanguage = isset($_GET['language']) ? urlencode($_GET['language']) : '';
    $getPage = isset($_GET['page']) ? urlencode($_GET['page']) : '';
    $comparePage = (empty($getPage) && empty($getLanguage)) ? $configDefaultPage : $getPage;

    foreach ($configPages[getLanguage()] as $keyPage => $page) {
        if($page['slug'] === $comparePage) {
            $pageId = $keyPage;
        }
    }
    return $pageId;
}

// Get page link
function getPageLink($pageId = '') {
    global $config;
    global $pages;
    $configDefaultLanguage = $config['defaultLanguage'];
    $configDefaultPage = $config['defaultPage'];
    $configPages = $pages[getLanguage()];

    $pageLink = '';

    if(!empty($pageId)) {
        foreach ($configPages as $keyPage => $page) {
            if($keyPage === $pageId) {
                if(getLanguage() !== $configDefaultLanguage) {
                    $pageLink = getLanguage() . '/' . $page['slug'] . '/';
                } else {
                    if($page['slug'] !== $configDefaultPage) {
                        $pageLink = $page['slug'] . '/';
                    }
                }
            }
        }
    }
    return getThemeUrl() . $pageLink;
}

// Get page title
function getPageTitle($pageId = '') {
    global $pages;
    $configPages = call_user_func_array('array_merge', $pages);
    $pageId = empty($pageId) ? getPageId() : $pageId;

    $pageTitle = (!empty($pageId) && array_key_exists($pageId, $configPages)) ? $configPages[$pageId]['title'] : l('global', 'title-404', getLanguage());
    return $pageTitle;
}

// Get page slug
function getPageSlug($pageId = '') {
    global $pages;
    $configPages = call_user_func_array('array_merge', $pages);
    $pageId = empty($pageId) ? getPageId() : $pageId;

    $pageSlug = (!empty($pageId) && array_key_exists($pageId, $configPages)) ? $configPages[$pageId]['slug'] : '';
    return $pageSlug;
}

// Get page info (metadata)
function getPageInfo($text) {
    global $pages;
    $configPages = call_user_func_array('array_merge', $pages);
    $pageInfo = (!empty(getPageId()) && array_key_exists(getPageId(), $configPages)) ? $configPages[getPageId()][$text] : '';
    return $pageInfo;
}

// Get homepage link
function getHomePageLink() {
    global $config;
    global $pages;
    $configLanguages = $config['languages'];
    $configDefaultLanguage = $config['defaultLanguage'];
    $configPages = $pages;

    $pageHomePageLink = '';
    $getLanguage = isset($_GET['language']) ? urlencode($_GET['language']) : '';
    $getPage = isset($_GET['page']) ? urlencode($_GET['page']) : '';

    if(!empty($getLanguage) && array_key_exists($getLanguage, $configLanguages) && $getLanguage !== $configDefaultLanguage && !empty($getPage)) {
        foreach ($configPages[$getLanguage] as $page) {
            if (isset($page['defaultLanguagePage']) && $page['defaultLanguagePage']) {
                $pageHomePageLink = $getLanguage . '/' . $page['slug'] . '/';
                break;
            }
        }
    }

    return getThemeUrl() . $pageHomePageLink;
}

// Get pages
function getPages($language = '') {
    global $pages;
    $languagePages = $pages[(empty($language)) ? getLanguage() : $language];
    return $languagePages;
}

// If is homepage
function isHomePage() {
    global $config;
    global $pages;
    $configLanguages = $config['languages'];
    $configDefaultLanguage = $config['defaultLanguage'];
    $configPages = $pages;

    $isHomePage = false;
    $getLanguage = isset($_GET['language']) ? urlencode($_GET['language']) : '';
    $getPage = isset($_GET['page']) ? urlencode($_GET['page']) : '';

    if(empty($getLanguage) && empty($getPage)) {
        $isHomePage = true;
    }

    if(!empty($getLanguage) && array_key_exists($getLanguage, $configLanguages) && $getLanguage !== $configDefaultLanguage && !empty($getPage)) {
        foreach ($configPages[$getLanguage] as $page) {
            if ($page['slug'] === $getPage && isset($page['defaultLanguagePage']) && $page['defaultLanguagePage']) {
                $isHomePage = true;
                break;
            }
        }
    }

    return $isHomePage;
}

// If is specific page
function isPage($pageId) {
    $comparePageId = getPageId();
    return ($pageId === $comparePageId) ? true : false;
}

// If is #404 page
function isPage404() {
    $is404 = empty(getPageId()) ? true : false;
    return $is404;
}


/* --- Language settings --- */

// Get language
function getLanguage() {
    global $config;
    $configLanguages = $config['languages'];
    $configDefaultLanguage = $config['defaultLanguage'];

    $language = $configDefaultLanguage;
    $getLanguage = isset($_GET['language']) ? urlencode($_GET['language']) : '';
    $getPage = isset($_GET['page']) ? urlencode($_GET['page']) : '';

    if(empty($getLanguage)) {
        $getLanguage = $getPage;
    }

    if(!empty($getLanguage) && $getLanguage !== $configDefaultLanguage && array_key_exists($getLanguage, $configLanguages)) {
        $language = $getLanguage;
    }
    return $language;
}

// Get languages
function getLanguages() {
    global $config;
    $configLanguages = $config['languages'];
    return $configLanguages;
}

// If is specific language
function isLanguage($language) {
    return ($language === getLanguage()) ? true : false;
}


/* --- Source functions --- */

// Get source URL
function getSourceUrl($componentName, $sourceName) {
    $environment = (isDevelopEnvironment()) ? 'develop' : 'production';
    $sourceUrl = getThemeUrl() . 'build/' . $environment . '/images/' . $componentName . '/' . $sourceName . v(false);
    return $sourceUrl;
}

// Version
function v($print = true) {
    global $config;
    $version = (isDevelopEnvironment()) ? time() : $config['version'];
    if (!$print) {
        return '?v=' . $version;
    }
    echo '?v=' . $version;
}

/* --- Template functions --- */

// Get template
function getTemplate() {
    global $pages;
    $configPages = call_user_func_array('array_merge', $pages);

    if(!isPage404() && array_key_exists(getPageId(), $configPages)) {
        $template = $configPages[getPageId()]['template'];
        $fileTemplate = dirname(__DIR__, 1) . '/templates/' . $template . '.php';
        if (file_exists($fileTemplate)) {
            include_once $fileTemplate;
        }
    } else {
        $fileTemplate = dirname(__DIR__, 1) . '/templates/404.php';
        include_once $fileTemplate;
    }
}


/* --- Components functions --- */

// Get component
function getComponent($componentName = '', $componentFile = '', $data = []) {
    if (!empty($componentName) && !empty($componentFile)) {
        require 'components/' . $componentName . '/' . $componentFile . '.php';
    }
}

// Get content for component (languages + data)
function getContent($componentName, $componentType = '') {
    $fileComponentLanguages = dirname(__DIR__, 1) . '/components/' . $componentName . '/data/languages.php';
    $fileComponentContent = dirname(__DIR__, 1) . '/components/' . $componentName . '/data/content.php';

    $languages = $content = [];

    if (file_exists($fileComponentLanguages)) {
        include $fileComponentLanguages;
        try {
            if (empty($languages[getLanguage()])) {
                throw new Exception('It is not defined component LANGUAGE');
            } else {
                $languages = $languages[getLanguage()];
            }
        } catch (Exception $e) {
            echo "\n", '<pre>' . $e->getMessage() . '</pre>';
        }
    }

    if (file_exists($fileComponentContent)) {
        include $fileComponentContent;
        try {
            if (empty($content[getLanguage()])) {
                throw new Exception('It is not defined component CONTENT');
            } else {
                $content = $content[getLanguage()];
            }
        } catch (Exception $e) {
            echo "\n", '<pre>' . $e->getMessage() . '</pre>';
        }
    }

    if (!empty($componentType) && $languages) {
        $languages = $languages[$componentType];
    }

    if (!empty($componentType) && $content) {
        $content = $content[$componentType];
    }

    $content = [
        'languages' => $languages,
        'content' => $content
    ];

    return $content;
}

/* --- Debug and develop --- */

// If is develop environment
function isDevelopEnvironment() {
    global $config;
    return $config['isDevelopEnvironment'];
}

// Pretty print
function pp($string) {
    print '<pre style="display: block; box-sizing: border-box; background-color: #111111; color: #FFFFFF; font-family: sans-serif; width: 100%; padding: 1.5rem; text-align: left; margin: 1rem 0;">';
    var_dump($string);
    print '</pre>';
}

// Debug PHP functions
function debugFunctions() {
    global $config;

    if($config['debug']) {
        pp('getThemeUrl: ' . getThemeUrl());
        pp('getPageId: ' . getPageId());
        pp('getPageLink: ' . getPageLink());
        pp('getPageTitle: ' . getPageTitle());
        pp('getPageSlug: ' . getPageSlug());
        pp('getHomePageLink: ' . getHomePageLink());

        pp('isHomePage: ' . isHomePage());
        pp('isPage404: ' . isPage404());

        pp('getLanguage: ' . getLanguage());
    }
}
?>