<?php 
$this->Html->scriptStart();
$scripts = json_encode($scripts);
echo <<<EOD
head.load($scripts);
EOD;
echo $this->Html->scriptEnd();
?>