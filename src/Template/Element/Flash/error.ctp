<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="row" onclick="this.classList.add('hidden');"><div class="alert bg-red"><?= $message ?></div></div>
