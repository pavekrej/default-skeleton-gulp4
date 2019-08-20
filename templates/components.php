<?php
/**
 * COMPONENTS - template
 */
?>

<div class="container">
    <div class="content__group">
        <h2>Message</h2>
        <div class="content__item">
            <?php
            // MESSAGE
            $componentData = getComponentData('message', 'info');
            getComponent('message', 'index', $componentData);
            ?>
        </div>
        <div class="content__item">
            <?php
            // MESSAGE
            $componentData = getComponentData('message', 'success');
            getComponent('message', 'index', $componentData);
            ?>
        </div>
        <div class="content__item">
            <?php
            // MESSAGE
            $componentData = getComponentData('message', 'warning');
            getComponent('message', 'index', $componentData);
            ?>
        </div>
        <div class="content__item">
            <?php
            // MESSAGE
            $componentData = getComponentData('message', 'error');
            getComponent('message', 'index', $componentData);
            ?>
        </div>
    </div>

    <div class="content__group">
        <h2>Error</h2>
        <div class="content__item">
            <?php
            // ERROR - 404
            getComponent('error', '404');
            ?>
        </div>
    </div>
</div>
