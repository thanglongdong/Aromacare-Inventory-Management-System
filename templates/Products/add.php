<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \Cake\Collection\CollectionInterface|string[] $ingredients
 */
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h1 class="h3 mb-2 text-success"><?= __('New Product') ?></h1>
            </div>
            <br </br>

            <div>
                <?= $this->Form->create($product,['novalidate' => true]) ?>
                <?= $this->Form->control('name') ?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('type') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('price') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('size'); ?>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('stock') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('sku',['label'=>'SKU']) ?>
                    </div>
                </div>
                <?= $this->Form->control('description') ?>
                <?= $this->Form->control('ingredients._ids', ['options' => $ingredients]) ?>
                <br </br>

                <div>
                    <?= $this->Form->button(__('Add Product'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'btn btn-outline-success flex-shrink-0']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<br </br>
