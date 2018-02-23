<?php
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });
?>
<div class="<?= $pluralVar ?> form">
    <CakePHPBakeOpenTag= $this->Form->create($<?= $singularVar ?>) CakePHPBakeCloseTag>
    <fieldset>
        <legend><CakePHPBakeOpenTag= __('<?= Inflector::humanize($action) ?> <?= $singularHumanName ?>') CakePHPBakeCloseTag></legend>
        <CakePHPBakeOpenTagphp
<?php
        foreach ($fields as $field) {
            if (in_array($field, $primaryKey)) {
                continue;
            }
            if (isset($keyFields[$field])) {
                $fieldData = $schema->column($field);
                if (!empty($fieldData['null'])) {
?>
        echo $this->Form->control('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>, 'empty' => true]);
<?php
                } else {
?>
        echo $this->Form->control('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>]);
<?php
                }
                continue;
            }
            if (!in_array($field, ['created', 'modified', 'updated'])) {
                $fieldData = $schema->column($field);
                if (($fieldData['type'] === 'date') && (!empty($fieldData['null']))) {
?>
        echo $this->Form->control('<?= $field ?>', ['empty' => true, 'default' => '']);
<?php
                } else {
                    if (empty($fieldData['null'])) {
?>
        echo $this->Form->control('<?= $field ?>'); <?php // Required fields ?>

<?php
                    } else {
?>
        echo $this->Form->control('<?= $field ?>');
<?php
                    }

                }
            }
        }
        if (!empty($associations['BelongsToMany'])) {
            foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
?>
        echo $this->Form->control('<?= $assocData['property'] ?>._ids', ['options' => $<?= $assocData['variable'] ?>]);
<?php
            }
        }
?>
        CakePHPBakeCloseTag>
    </fieldset>
    <CakePHPBakeOpenTag= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) CakePHPBakeCloseTag>
    <CakePHPBakeOpenTag= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn btn-default'])CakePHPBakeCloseTag>
    <CakePHPBakeOpenTag= $this->Form->end() CakePHPBakeCloseTag>
</div>
