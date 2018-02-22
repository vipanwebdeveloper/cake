<h1><?= $this->request->controller?></h1>

<div class="buttons">
    <?= $this->Html->link('<span class=\'glyphicon glyphicon-plus\'></span> Add new', ['action' => 'add'], ['class' => 'btn btn-primary', 'escape' => false]);?>
</div>

<div class="search">
    <?php
    echo $this->Form->create(null, ['class' => 'form-inline']);
    echo $this->Form->control('title');
    echo $this->Form->button('<span class=\'glyphicon glyphicon-search\'></span> Filter',['type' => 'submit', 'class' => 'btn btn-success']);
    echo $this->Html->link('Reset', ['action' => 'index'], ['class' => 'btn btn-default']);
    echo $this->Form->end();
    ?>
</div>

<div class="examples index">
    <table cellpadding="0" cellspacing="0" class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="number"><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th class="number"><?= $this->Paginator->sort('age') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($examples as $example): ?>
        <tr>
            <td class="number"><?= $this->Number->format($example->get('id')) ?></td>
            <td><?= h($example->get('name'))?></td>
            <td class="number"><?= $this->Number->format($example->get('age')) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $example->id], ['class' => 'btn btn-default btn-sm']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $example->id], ['class' => 'btn btn-default btn-sm']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $example->id], ['confirm' => __('Are you sure you want to delete # {0}?', $example->id), 'class' => 'btn btn-sm btn-danger']) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>

    <?= $this->Paginator->numbers() ?>
</div>
