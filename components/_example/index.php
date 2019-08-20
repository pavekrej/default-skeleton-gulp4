<?php
/**
 * EXAMPLE
 */
?>

<?php if(!empty($data)) { ?>
    <div class="example">
        <h4 class="h3 margin--reset"><span class="example--vendor">/component/_example/</span> = <?php echo $data['languages']['vendor-text']; ?></h4>
        <br />
        <p>
            <b>/components/example-component/data/languages.php:</b>
            <br /><code>$data['config']['id']:</code> <mark><?php echo $data['config']['id']; ?></mark>
        </p>
        <p>
            <b>/components/example-component/data/languages.php:</b>
            <br /><code>$data['languages']['title']:</code> <mark><?php echo $data['languages']['title']; ?></mark>
        </p>
        <p class="margin--reset">
            <b>/components/example-component/data/content.php:</b>
            <br /><code>$data['content']['description']:</code> <mark><?php echo $data['content']['description']; ?></mark>
        </p>
    </div>
<?php } ?>