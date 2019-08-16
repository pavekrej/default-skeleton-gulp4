<?php
/**
 * MESSAGE
 */

if(!empty($data['type']) && (!empty($data['languages']['title']) || !empty($item['languages']['text']))) {
    ?>
    <div class="message message--<?php echo $data['type']; ?>">
        <input type="checkbox" id="message-<?php echo $data['id']; ?>">
        <label for="message-<?php echo $data['id']; ?>"></label>
        <i></i>
        <div class="wrapper"><?php if (!empty($data['languages']['title'])) { ?>
            <b><?php echo $data['languages']['title']; ?></b><?php } ?><?php if (!empty($data['languages']['text'])) { ?><?php echo $data['languages']['text']; ?><?php } ?>
        </div>
    </div>
    <?php
}
?>