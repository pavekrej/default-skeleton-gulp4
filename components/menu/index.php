<?php
/**
 * MENU
 */

if(!empty($data['languages']['pages'])) { ?>
    <nav class="menu">
        <ul class="menu__list">
            <?php
            foreach ($data['languages']['pages'] as $keyItem => $item) {
                if ($item['showInMenu']) {
                    ?>
                    <li class="menu__item">
                        <a class="menu__item-link<?php if(isPage($keyItem)) { ?> menu__item-link--active<?php } ?>"
                           href="<?php echo getPageLink($keyItem); ?>" title="<?php echo $item['title']; ?>">
                            <?php echo $item['title']; ?>
                        </a>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </nav>
<?php } ?>