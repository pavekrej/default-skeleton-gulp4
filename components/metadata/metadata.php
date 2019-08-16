<?php
/**
 * METADATA
 */

if(!isPage404()) {
    $description = getPageInfo('description');
    $keywords = getPageInfo('keywords');
    $author = getWebAuthor();
    ?>
    <?php if(!empty($description)) { ?>
    <meta name="description" content="<?php echo $description; ?>">
    <?php } ?>
    <?php if(!empty($keywords)) { ?>
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <?php } ?>
    <meta name="author" content="<?php  echo $author; ?>">
    <meta name="robots" content="index, follow">
<?php } else { ?>
    <meta name="robots" content="noindex, follow">
<?php } ?>