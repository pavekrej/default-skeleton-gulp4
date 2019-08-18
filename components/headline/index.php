<?php
/**
 * HEADLINE
 */
?>

<div class="headline<?php if(isHomePage()) { ?> headline--homepage<?php } ?>">
    <div class="container">
        <div class="headline__title"><?php echo getPageTitle(); ?></div>
    </div>
</div>