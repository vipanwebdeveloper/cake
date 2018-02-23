<?php
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return !in_array($schema->columnType($field), ['binary', 'text']);
    })
    ->take(7);
?>
<h1><CakePHPBakeOpenTag= $this->request->controllerCakePHPBakeCloseTag></h1>

<div class="buttons">
    <CakePHPBakeOpenTag= $this->Html->link('<span class=\'glyphicon glyphicon-plus\'></span> Add new', ['action' => 'add'], ['class' => 'btn btn-primary', 'escape' => false]);CakePHPBakeCloseTag>
</div>

<div class="search">
    <CakePHPBakeOpenTagphp
    echo $this->Form->create(null, ['class' => 'form-inline']);
    echo $this->Form->control('title');
    echo $this->Form->button('<span class=\'glyphicon glyphicon-search\'></span> Filter',['type' => 'submit', 'class' => 'btn btn-success']);
    echo $this->Html->link('Reset', ['action' => 'index'], ['class' => 'btn btn-default']);
    echo $this->Form->end();
    CakePHPBakeCloseTag>
</div>

<div class="<?= $pluralVar ?> index">
    <table cellpadding="0" cellspacing="0" class="table table-hover table-striped">
    <thead>
        <tr>
    <?php foreach ($fields as $field):
            $class = '';
            if (in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
                $class = ' class="number"';
            } elseif (in_array($schema->columnType($field), ['date', 'datetime', 'timestamp', 'time'])) {
                $class = ' class="time"';
            } elseif (in_array($schema->columnType($field), ['boolean'])) {
            $class = ' class="boolean"';
            }
            ?>
        <th<?= $class ?>><CakePHPBakeOpenTag= $this->Paginator->sort('<?= $field ?>') CakePHPBakeCloseTag></th>
    <?php endforeach; ?>
        <th class="actions"><CakePHPBakeOpenTag= __('Actions') CakePHPBakeCloseTag></th>
        </tr>
    </thead>
    <tbody>
    <CakePHPBakeOpenTagphp foreach ($<?= $pluralVar ?> as $<?= $singularVar ?>): CakePHPBakeCloseTag>
        <tr>
<?php        foreach ($fields as $field) {
            $isKey = false;
            if (!empty($associations['BelongsTo'])) {
                foreach ($associations['BelongsTo'] as $alias => $details) {
                    if ($field === $details['foreignKey']) {
                        $isKey = true;
?>
            <td>
                <CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>->get('<?= $details['property'] ?>')->get('<?= $details['displayField'] ?>'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>->get('<?= $details['property'] ?>')->get('<?= $details['primaryKey'][0] ?>')]) : '' CakePHPBakeCloseTag>
            </td>
<?php
                        break;
                    }
                }
            }
            if ($isKey !== true) {
                if (in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
?>
            <td class="number"><CakePHPBakeOpenTag= $this->Number->format($<?= $singularVar ?>->get('<?= $field ?>')) CakePHPBakeCloseTag></td>
<?php
                } elseif (in_array($schema->columnType($field), ['date', 'datetime', 'timestamp', 'time'])) {
?>
            <td class="time"><CakePHPBakeOpenTag= $this->Time->timeAgoInWords($<?= $singularVar ?>->get('<?= $field ?>')) CakePHPBakeCloseTag></td>
<?php
                } elseif (in_array($schema->columnType($field), ['boolean'])) {
?>
            <td class="boolean"><CakePHPBakeOpenTagphp
                if ($<?= $singularVar ?>->get('<?= $field ?>')) {
                    echo "<span class='glyphicon glyphicon-ok bool-true'></span>";
                } else {
                    echo "<span class='glyphicon glyphicon-remove bool-false'></span>";
                }
            CakePHPBakeCloseTag></td>
<?php
                } else {
?>
            <td><CakePHPBakeOpenTag= h($<?= $singularVar ?>->get('<?= $field ?>'))CakePHPBakeCloseTag></td>
<?php
                }
            }
        }

        $pk = '$' . $singularVar . '->' . $primaryKey[0];
?>
            <td class="actions">
                <CakePHPBakeOpenTag= $this->Html->link(__('View'), ['action' => 'view', <?= $pk ?>], ['class' => 'btn btn-default btn-sm']) CakePHPBakeCloseTag>
                <CakePHPBakeOpenTag= $this->Html->link(__('Edit'), ['action' => 'edit', <?= $pk ?>], ['class' => 'btn btn-default btn-sm']) CakePHPBakeCloseTag>
                <CakePHPBakeOpenTag= $this->Form->postLink(__('Delete'), ['action' => 'delete', <?= $pk ?>], ['confirm' => __('Are you sure you want to delete # {0}?', <?= $pk ?>), 'class' => 'btn btn-sm btn-danger']) CakePHPBakeCloseTag>
            </td>
        </tr>

    <CakePHPBakeOpenTagphp endforeach; CakePHPBakeCloseTag>
    </tbody>
    </table>

    <CakePHPBakeOpenTag= $this->Paginator->numbers() CakePHPBakeCloseTag>
</div>
