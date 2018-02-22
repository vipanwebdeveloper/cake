<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $example
 */
?>
<div class="examples form">
    <?= $this->Form->create($example) ?>
    <fieldset>
        <legend><?= __('Add Example') ?></legend>
        <?php
        echo $this->Form->control('name'); 
        echo $this->Form->control('age'); 
        echo $this->Form->control('descriptionv'); 
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
    <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default'])?>
    <?= $this->Form->end() ?>
</div>
