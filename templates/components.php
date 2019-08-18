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
            $componentContent = getContent('message', 'welcome');
            $componentConfig = [
                'id'    => 'info',
                'type'  => 'info'
            ];
            $componentData = array_merge($componentContent, $componentConfig);
            getComponent('message', 'index', $componentData);
            ?>
        </div>
        <div class="content__item">
            <?php
            // MESSAGE
            $componentContent = getContent('message', 'welcome');
            $componentConfig = [
                'id'    => 'success',
                'type'  => 'success'
            ];
            $componentData = array_merge($componentContent, $componentConfig);
            getComponent('message', 'index', $componentData);
            ?>
        </div>
        <div class="content__item">
            <?php
            // MESSAGE
            $componentContent = getContent('message', 'welcome');
            $componentConfig = [
                'id'    => 'warning',
                'type'  => 'warning'
            ];
            $componentData = array_merge($componentContent, $componentConfig);
            getComponent('message', 'index', $componentData);
            ?>
        </div>
        <div class="content__item">
            <?php
            // MESSAGE
            $componentContent = getContent('message', 'welcome');
            $componentConfig = [
                'id'    => 'error',
                'type'  => 'error'
            ];
            $componentData = array_merge($componentContent, $componentConfig);
            getComponent('message', 'index', $componentData);
            ?>
        </div>
    </div>

    <div class="content__group">
        <h2>Error</h2>
        <div class="content__item">
            <?php
            // ERROR
            getComponent('error', '404');
            ?>
        </div>
    </div>
</div>
