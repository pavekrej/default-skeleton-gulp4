<?php
/**
 * HOMEPAGE - template
 */
?>

<div class="container">
    <div class="content__group">
        <h1>README.md</h1>
        <pre><code><?php include_once 'README.md'; ?></code></pre>
    </div>

    <div class="content__group">
        <h2>Component usage</h2>

        <h3>DEFAULT component with DEFAULT data</h3>
        <?php
        // EXAMPLE COMPONENT AND VENDOR
        $componentData = getComponentData('_example');
        getComponent('_example', 'index', $componentData);
        ?>

        <h3>DEFAULT component with CUSTOM data</h3>
        <?php
        // EXAMPLE COMPONENT AND VENDOR (Custom data)
        $componentData = getComponentData('_example', '_example-custom');
        getComponent('_example', 'index', $componentData);
        ?>

        <h3>CUSTOM component with DEFAULT data</h3>
        <?php
        // EXAMPLE COMPONENT AND VENDOR (Custom component)
        $componentData = getComponentData('_example');
        getComponent('_example', 'example', $componentData);
        ?>

        <h3>CUSTOM component with CUSTOM data</h3>
        <?php
        // EXAMPLE COMPONENT AND VENDOR (Custom component + custom data)
        $componentData = getComponentData('_example', '_example-custom');
        getComponent('_example', 'example', $componentData);
        ?>
    </div>
</div>