

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingredient $ingredient
 * @var string[]|\Cake\Collection\CollectionInterface $suppliers
 * @var string[]|\Cake\Collection\CollectionInterface $products
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
                <h1 class="h3 mb-2 text-success"><?= __('Edit Ingredients') ?></h1>
            </div>
            <br </br>
            <div>
                <?= $this->Form->create($ingredient,['novalidate' => true, 'type'=>'file']) ?>
                <?= $this->Form->control('name')?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('stock')?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('price') ?>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('supplier_id', ['options' => $suppliers, 'empty' => true])?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('products._ids', ['options' => $products, 'empty' => true])?>
                    </div>
                </div>
                <br>
                <div>
                    <?= $this->Form->button(__('Save Changes'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->end() ?>
                    <?= $this->Form->postLink(
                        __('Delete Ingredient'),
                        ['action' => 'delete', $ingredient->id],
                        ['confirm' => __('Are you sure you want to delete ingredient {0}?', $ingredient->name), 'class' => 'btn btn-outline-success float-right mr-2']
                    ) ?>
                    <?= $this->Html->link(__('List Ingredient'), ['action' => 'index'], ['class' => 'btn btn-outline-success me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>

<br </br>

