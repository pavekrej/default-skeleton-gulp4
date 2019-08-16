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
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&amp;display=swap" rel="stylesheet">
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

            // MESSAGE - WELCOME - Example of usage component with specific data
            /*$componentContent = getContent('message', 'welcome');
            $componentConfig = [
                'id'    => 'welcome',
                'type'  => 'info'
            ];
            $componentData = array_merge($componentContent, $componentConfig);
            getComponent('message', 'index', $componentData);*/
            ?>

            <?php
            // HEADER
            $componentData = getContent('header');
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
            $componentData = getContent('footer');
            getComponent('footer', 'index', $componentData);
            ?>
        </div>

        <script src="<?php echo $buildSource .'/vendors/script' . $fileExtension; ?>.js<?php v(); ?>"></script>
        <script src="<?php echo $buildSource .'/js/script' . $fileExtension; ?>.js<?php v(); ?>"></script>

    </body>
</html>