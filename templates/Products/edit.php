<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var string[]|\Cake\Collection\CollectionInterface $ingredients
 */
?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<!-- End of Tabs -->
<br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h1 class="h3 mb-2 text-success"><?= __('Edit Product') ?></h1>
            </div>

            <div>
                <?= $this->Form->create($product,['novalidate' => true, 'type'=>'file']) ?>
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
                    <?= $this->Form->button(__('Save Changes'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'btn btn-outline-success flex-shrink-0']) ?>
                    <?= $this->Form->postLink(
                        __('Delete Product'),
                        ['action' => 'delete', $product->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'btn btn-outline-success flex-shrink-0']
                    ) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<br </br>

