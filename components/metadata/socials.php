<?php
/**
 * SOCIALS
 */

if(!isPage404()) {
    $description = getPageInfo('description');

    // Open Graph
    ?>
    <meta property="og:title" content="<?php echo getPageTitle(); ?>">
    <meta property="og:site_name" content="<?php echo getWebTitle(); ?>">
    <meta property="og:url" content="<?php echo getBaseUrl() . getPageLink(getPageId()); ?>">
    <?php if(!empty($description)) { ?>
    <meta property="og:description" content="<?php echo $description; ?>">
    <?php } ?>
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo getBaseUrl(); ?><?php echo getSourceUrl('metadata', 'socials/1200x630.png'); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
<?php } ?>