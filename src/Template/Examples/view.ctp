<div class="examples view">
    <h2><?= h($example->get('name')) ?></h2>
    <div class="non-text">
        <div class="strings">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Name') ?></h3></div>
                <div class="panel-body"><?= h($example->get('name')) ?></div>
            </div>
        </div>
        <div class="numbers">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Id') ?></h3></div>
                <div class="panel-body"><?= $this->Number->format($example->get('id')) ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><?= __('Age') ?></h3></div>
                <div class="panel-body"><?= $this->Number->format($example->get('age')) ?></div>
            </div>
        </div>
    </div>
    <div class="texts">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><?= __('Descriptionv') ?></h3></div>
            <div class="panel-body"><?= $this->Text->autoParagraph(h($example->get('descriptionv'))) ?></div>
        </div>
    </div>
</div>
