<?php 
$this->Html->scriptStart();
$css = json_encode($css);
echo <<<EOD
head.load($css);
EOD;
echo $this->Html->scriptEnd();
?>