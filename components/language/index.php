<?php
/**
 * LANGUAGE
 */

if(!empty($data['languages'])) { ?>
<div class="language">
    <ul class="language__list">
        <?php foreach ($data['languages'] as $keyItem => $item) { ?>
            <li class="language__item">
                <a class="language__item-link<?php if(getLanguage() === $keyItem) { ?> language__item-link--active<?php } ?>" href="<?php echo getThemeUrl() . $keyItem; ?>" title="<?php echo $item['title']; ?>">
                    <?php echo $item['title']; ?>
                </a>
            </li>
       <?php } ?>
    </ul>
</div>
<?php } ?>