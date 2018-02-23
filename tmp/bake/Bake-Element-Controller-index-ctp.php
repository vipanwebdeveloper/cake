    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $query = $this-><?= $currentModelName ?>->find();
<?php $belongsTo = $this->Bake->aliasExtractor($modelObj, 'BelongsTo'); ?>
<?php if ($belongsTo): ?>
        $query->contain([<?= $this->Bake->stringifyList($belongsTo, ['indent' => false]) ?>]);
<?php endif; ?>

        $this->set('<?= $pluralName ?>', $this->paginate($query, [
            'order' => [$this-><?= $currentModelName ?>->aliasField('modified') => 'desc']
        ));
    }
