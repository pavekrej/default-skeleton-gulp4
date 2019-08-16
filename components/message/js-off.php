<?php
/**
 * MESSAGE - JS OFF
 */
?>

<noscript>
<?php
// MESSAGE
$content = getContent('message', 'js-off');
$componentConfig = [
    'id'    => 'js-off',
    'type'  => 'warning'
];
$data = array_merge($content, $componentConfig);
getComponent('message', 'index', $data);
?>
</noscript>