<?php
/**
 * WEB
 */

include_once 'application/_functions.php';
?>

<!DOCTYPE HTML>
<html lang="<?php echo getLanguage(); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
        <title><?php echo (!isPage404()) ?  getPageTitle() . ' | ' . getWebTitle() : l('global', 'title-404'); ?></title>
        <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700%7CPT+Sans:400,700&amp;display=swap&amp;subset=latin-ext" rel="stylesheet">
        <?php
        // Sources
        $source = (isDevelopEnvironment()) ? 'develop' : 'production';
        $fileExtension = (isDevelopEnvironment()) ? '' : '.min';
        $buildSource = getThemeUrl() . 'build/' . $source;
        ?>
        <link href="<?php echo $buildSource . '/vendors/style' . $fileExtension; ?>.css<?php v(); ?>" rel="stylesheet">
        <link href="<?php echo $buildSource . '/css/style' . $fileExtension; ?>.css<?php v(); ?>" rel="stylesheet">
        <?php
        // Metadata
        getComponent('metadata', 'author');
        getComponent('metadata', 'metadata');
        getComponent('metadata', 'socials');
        getComponent('metadata', 'favicons');
        getComponent('metadata', 'geo');
        ?>
    </head>
    <body class="no-js <?php echo 'language-' . getLanguage() . ' page-' . getPageSlug() . '-' . getLanguage(); ?>">
        <script>document.body.className=document.body.className.replace(/no-js/,'js');</script>
        <div class="page-wrapper">
            <?php
            // MESSAGE - OLD BROWSER
            getComponent('message', 'old-browser');

            // MESSAGE - JS OFF
            getComponent('message', 'js-off');

            // MESSAGE - WELCOME
            $componentData = getComponentData('message', 'welcome');
            getComponent('message', 'index', $componentData);
            ?>

            <?php
            // HEADER
            $componentData = getComponentData('header');
            getComponent('header', 'index', $componentData);

            // HEADLINE
            getComponent('headline', 'index');
            ?>

            <div class="content content-<?php echo getPageSlug() . '-' . getLanguage(); ?>">
                <?php
                // TEMPLATE
                getTemplate('headline', 'index');
                ?>
            </div>

            <?php
            // FOOTER
            $componentData = getComponentData('footer');
            getComponent('footer', 'index', $componentData);
            ?>
        </div>

        <script src="<?php echo $buildSource .'/vendors/script' . $fileExtension; ?>.js<?php v(); ?>"></script>
        <script src="<?php echo $buildSource .'/js/script' . $fileExtension; ?>.js<?php v(); ?>"></script>

    </body>
</html>