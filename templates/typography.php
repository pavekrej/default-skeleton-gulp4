<?php
/**
 * TYPOGRAPHY - template
 */
?>

<div class="container">
    <div class="content__group">
        <?php
        // CONTENT - TYPOGRAPHY - Main
        $componentData = getContent('content', 'typography-main');
        getComponent('content', 'index', $componentData);
        ?>
    </div>
    <div class="content__group">
        <?php
        // CONTENT - TYPOGRAPHY - Others
        $componentData = getContent('content', 'typography-others');
        getComponent('content', 'index', $componentData);
        ?>
    </div>
</div>

