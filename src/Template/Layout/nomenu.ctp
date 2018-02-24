<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
  <?= $this->Html->charset() ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

  <title>
    <?= APP_DESCRIPTION ?>:
    <?= $this->fetch('title') ?>
  </title>
  <?php $this->Html->scriptStart();?>
  <?= $this->Html->scriptEnd(); ?>
  <?= $this->fetch('common_script') ?>
  <?= $this->Html->meta('icon') ?>
  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->Headjs->css('css') ?>
</head>
<body class="login-page">
<div class="login-box">
  <div class="logo">
    <a href="javascript:void(0);">ADMIN<b>Area</b></a>
    <small><?= APP_DESCRIPTION;?> - Login</small>
  </div>
  <div class="card">
    <div class="body">
      <?= $this->fetch('content') ?>
    </div>
  </div>
</div>
<?= $this->Headjs->script('main_script') ?>
</body>
</html>
