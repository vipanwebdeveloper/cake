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
?><!-- File: src/Template/Users/login.ctp -->
<?= $this->Form->create() ?>
    <div class="msg"><?= __('Sign in to start your session') ?></div>
    <?= $this->Flash->render() ?>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">person</i>
        </span>
        <?= $this->Form->control('username', ['label'=>false, 'placeholder'=>"Username"]) ?>
    </div>
    <div class="input-group">
        <span class="input-group-addon">
        <i class="material-icons">lock</i>
        </span>
        <?= $this->Form->control('password', ['label'=>false, 'type'=>'password']) ?>
    </div>
    <div class="row">
        <div class="col-xs-8 p-t-5">
            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
            <label for="rememberme">Remember Me</label>
        </div>
        <div class="col-xs-4">
            <?= $this->Form->button(__('SIGN IN'), ['class'=>'btn btn-block bg-pink waves-effect']); ?>
        </div>
    </div>
    <div class="row m-t-15 m-b--20">
        <div class="col-xs-6">
            <a href="sign-up.html">Register Now!</a>
        </div>
        <div class="col-xs-6 align-right">
            <a href="forgot-password.html">Forgot Password?</a>
        </div>
    </div>
<?= $this->Form->end() ?>
