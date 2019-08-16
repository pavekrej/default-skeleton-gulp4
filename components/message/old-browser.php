<?php
/**
 * MESSAGE - OLD BROWSER
 */
?>

<!--[if IE]>
<?php
// MESSAGE
$content = getContent('message', 'old-browser');
    $componentConfig = [
        'id'    => 'old-browser',
        'type'  => 'error'
    ];
$data = array_merge($content, $componentConfig);
getComponent('message', 'index', $data);
?>
<![endif]-->