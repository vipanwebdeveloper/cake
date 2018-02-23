<?php
use Cake\Utility\Inflector;

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'] + $associations['HasOne'];
$associationFields = collection($fields)
    ->map(function($field) use ($immediateAssociations) {
        foreach ($immediateAssociations as $alias => $details) {
            if ($field === $details['foreignKey']) {
                return [$field => $details];
            }
        }
    })
    ->filter()
    ->reduce(function($fields, $value) {
        return $fields + $value;
    }, []);

$groupedFields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    })
    ->groupBy(function($field) use ($schema, $associationFields) {
        $type = $schema->columnType($field);
        if (isset($associationFields[$field])) {
            return 'string';
        }
        if (in_array($type, ['integer', 'float', 'decimal', 'biginteger'])) {
            return 'number';
        }
        if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
            return 'date';
        }
        return in_array($type, ['text', 'boolean']) ? $type : 'string';
    })
    ->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
?>
<div class="<?= $pluralVar ?> view">
    <h2><CakePHPBakeOpenTag= h($<?= $singularVar ?>->get('<?= $displayField ?>')) CakePHPBakeCloseTag></h2>
    <div class="non-text">
<?php if ($groupedFields['string']) : ?>
        <div class="strings">
<?php foreach ($groupedFields['string'] as $field) : ?>
<?php if (isset($associationFields[$field])) :
            $details = $associationFields[$field];
?>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($details['property']) ?>') CakePHPBakeCloseTag></h3></div>
                <div class="panel-body"><CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>->get('<?= $details['property'] ?>')->get('<?= $details['displayField'] ?>'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>->get('<?= $details['property'] ?>')->get('<?= $details['primaryKey'][0] ?>')]) : '' CakePHPBakeCloseTag></div>
            </div>
<?php else : ?>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></h3></div>
                <div class="panel-body"><CakePHPBakeOpenTag= h($<?= $singularVar ?>->get('<?= $field ?>')) CakePHPBakeCloseTag></div>
            </div>
<?php endif; ?>
<?php endforeach; ?>
        </div>
<?php endif; ?>
<?php if ($groupedFields['number']) : ?>
        <div class="numbers">
<?php foreach ($groupedFields['number'] as $field) : ?>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></h3></div>
                <div class="panel-body"><CakePHPBakeOpenTag= $this->Number->format($<?= $singularVar ?>->get('<?= $field ?>')) CakePHPBakeCloseTag></div>
            </div>
<?php endforeach; ?>
        </div>
<?php endif; ?>
<?php if ($groupedFields['date']) : ?>
        <div class="dates">
<?php foreach ($groupedFields['date'] as $field) : ?>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= "<?= __('" . Inflector::humanize($field) . "') ?>" ?></h3></div>
                <div class="panel-body"><CakePHPBakeOpenTag= $this->Time->timeAgoInWords($<?= $singularVar ?>->get('<?= $field ?>')) CakePHPBakeCloseTag></div>
            </div>
<?php endforeach; ?>
        </div>
<?php endif; ?>
<?php if ($groupedFields['boolean']) : ?>
        <div class="booleans">
<?php foreach ($groupedFields['boolean'] as $field) : ?>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></h3></div>
                <div class="panel-body"><CakePHPBakeOpenTag= $<?= $singularVar ?>->get('<?= $field ?>') ? __('Yes') : __('No'); CakePHPBakeCloseTag></div>
            </div>
<?php endforeach; ?>
        </div>
<?php endif; ?>
    </div>
<?php if ($groupedFields['text']) : ?>
    <div class="texts">
<?php foreach ($groupedFields['text'] as $field) : ?>
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></h3></div>
            <div class="panel-body"><CakePHPBakeOpenTag= $this->Text->autoParagraph(h($<?= $singularVar ?>->get('<?= $field ?>'))) CakePHPBakeCloseTag></div>
        </div>
<?php endforeach; ?>
    </div>
<?php endif; ?>
</div>
<?php
$relations = $associations['HasMany'] + $associations['BelongsToMany'];
foreach ($relations as $alias => $details):
    $otherSingularVar = Inflector::variable($alias);
    $otherPluralHumanName = Inflector::humanize($details['controller']);
    ?>
<div class="related row">
    <div class="col-md-12">
    <h4 class="subheader"><CakePHPBakeOpenTag= __('Related <?= $otherPluralHumanName ?>') CakePHPBakeCloseTag></h4>
    <CakePHPBakeOpenTagphp if (!empty($<?= $singularVar ?>->get('<?= $details['property'] ?>'))): CakePHPBakeCloseTag>
        <table cellpadding="0" cellspacing="0" class="table table-condensed table-striped">
            <tr>
                <?php foreach ($details['fields'] as $field): ?>
                    <th><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></th>
                <?php endforeach; ?>
                <th class="actions"><CakePHPBakeOpenTag= __('Actions') CakePHPBakeCloseTag></th>
            </tr>
            <CakePHPBakeOpenTagphp foreach ($<?= $singularVar ?>->get('<?= $details['property'] ?>') as $<?= $otherSingularVar ?>): CakePHPBakeCloseTag>
            <tr>
<?php foreach ($details['fields'] as $field): ?>
                    <?php if (in_array($field, ['created', 'modified', 'updated'])): ?>
                <td><CakePHPBakeOpenTag= $this->Time->timeAgoInWords($<?= $otherSingularVar ?>->get('<?= $field ?>')) CakePHPBakeCloseTag></td>
                    <?php else: ?>
                <td><CakePHPBakeOpenTag= h($<?= $otherSingularVar ?>->get('<?= $field ?>')) CakePHPBakeCloseTag></td>
                    <?php endif; ?>
<?php endforeach; ?>

<?php $otherPk = "\${$otherSingularVar}->{$details['primaryKey'][0]}"; ?>
                <td class="actions">
                    <CakePHPBakeOpenTag= $this->Html->link(__('View'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', <?= $otherPk ?>], ['class' => 'btn btn-xs btn-default']) CakePHPBakeCloseTag>
                    <CakePHPBakeOpenTag= $this->Html->link(__('Edit'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'edit', <?= $otherPk ?>], ['class' => 'btn btn-xs btn-default']) CakePHPBakeCloseTag>
                    <CakePHPBakeOpenTag= $this->Form->postLink(__('Delete'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'delete', <?= $otherPk ?>], ['confirm' => __('Are you sure you want to delete # {0}?', <?= $otherPk ?>), 'class' => 'btn btn-xs btn-danger']) CakePHPBakeCloseTag>
                </td>
            </tr>

            <CakePHPBakeOpenTagphp endforeach; CakePHPBakeCloseTag>
        </table>
    <CakePHPBakeOpenTagphp else: CakePHPBakeCloseTag>
        <div class="alert alert-warning">No related records found.</div>
    <CakePHPBakeOpenTagphp endif;CakePHPBakeCloseTag>
    </div>
</div>
<?php endforeach; ?>
