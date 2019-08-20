<?php
/**
 * MESSAGE
 */

if(!empty($data['config']['type']) && (!empty($data['languages']['title']) || !empty($item['languages']['text']))) {
    ?>
    <div class="message message__<?php echo $data['config']['type']; ?>">
        <input type="checkbox" id="message-<?php echo $data['config']['id']; ?>">
        <label for="message-<?php echo $data['config']['id']; ?>"></label>
        <i></i>
        <div class="wrapper"><?php if (!empty($data['languages']['title'])) { ?>
            <b><?php echo $data['languages']['title']; ?></b><?php } ?><?php if (!empty($data['languages']['text'])) { ?><?php echo $data['languages']['text']; ?><?php } ?>
        </div>
    </div>
    <?php
}
?>