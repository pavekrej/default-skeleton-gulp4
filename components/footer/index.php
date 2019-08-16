<?php
/**
 * FOOTER
 */
?>

<footer class="footer">
    <p class="footer__item">
        <strong><?php echo $data['languages']['title']; ?></strong>
        <span class="footer__item footer__item--description"><?php echo $data['content']['description']; ?></span>
    </p>
    <p class="footer__item"><a href="<?php echo getWebDomain(); ?>" title="<?php echo getWebTitle(); ?>"><?php echo getWebTitle(); ?></a></p>
    <p class="footer__item">Copyright ©&nbsp;<?php echo date('Y'); ?></p>
</footer>