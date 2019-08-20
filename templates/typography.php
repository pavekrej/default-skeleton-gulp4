<?php
/**
 * TYPOGRAPHY - template
 */
?>

<div class="container">
    <div class="content__group">
        <?php
        // CONTENT - TYPOGRAPHY - Main
        $componentData = getComponentData('content', 'typography-main');
        getComponent('content', 'index', $componentData);
        ?>
    </div>
    <div class="content__group">
        <?php
        // CONTENT - TYPOGRAPHY - Others
        $componentData = getComponentData('content', 'typography-others');
        getComponent('content', 'index', $componentData);
        ?>
    </div>
</div>

