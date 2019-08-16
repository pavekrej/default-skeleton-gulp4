<?php
/**
 * HEADER
 */
?>

<header class="header">
    <div class="header__container">
        <h1 class="header__title">
            <?php /*<img class="header__logo" src="<?php echo getSourceUrl('header', 'logo.svg'); ?>" alt="<?php echo $data['languages']['title']; ?>"> */ ?>
            <a class="header__link" href="<?php echo getHomePageLink(); ?>" title="<?php echo $data['languages']['title']; ?>">
                <?php echo $data['languages']['title']; ?>
            </a>
        </h1>
        <div class="header__subtitle"><?php echo $data['content']['description']; ?></div>
    </div>

    <div class="navigation__container">
        <?php
        // MENU
        $componentData = getContent('menu');
        getComponent('menu', 'index', $componentData);
        ?>

        <?php
        // LANGUAGE
        $componentData = getContent('language', 'languages');
        getComponent('language', 'index', $componentData);
        ?>
    </div>

</header>