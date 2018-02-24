<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="row"><div class="<?= h($class) ?>" onclick="this.classList.add('hidden');"><?= $message ?></div></div>
