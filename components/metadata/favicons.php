<?php
/**
 * FAVICONS
 */

$themeColor = '#111111';
?>

<link href="<?php echo getSourceUrl('meta', 'favicon.ico'). v(false); ?>" rel="icon">
<link href="<?php echo getSourceUrl('meta', 'apple-touch-icon.png'). v(false); ?>" rel="apple-touch-icon" sizes="180x180">
<link href="<?php echo getSourceUrl('meta', 'favicon-32x32.png'). v(false); ?>" rel="icon" type="image/png" sizes="32x32">
<link href="<?php echo getSourceUrl('meta', 'favicon-16x16.png'). v(false); ?>" rel="icon" type="image/png" sizes="16x16">
<link href="<?php echo getSourceUrl('meta', 'site.webmanifest'). v(false); ?>" rel="manifest">
<link href="<?php echo getSourceUrl('meta', 'safari-pinned-tab.svg'). v(false); ?>" rel="mask-icon" color="<?php echo $themeColor; ?>">
<meta name="msapplication-TileColor" content="<?php echo $themeColor; ?>">
<meta name="theme-color" content="<?php echo $themeColor; ?>">