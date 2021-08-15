

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
<p></p>
<!-- End of Tabs -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h1 class="h3 mb-2 text-gray-800"><?= __('Edit Ingredients') ?></h1>
            </div>

            <div>
                <?= $this->Form->create($ingredient,['novalidate' => true, 'type'=>'file']) ?>
                <?= $this->Form->control('name')?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('stock')?>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('price') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('supplier_id', ['options' => $suppliers, 'empty' => true])?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('products._ids', ['options' => $products, 'empty' => true])?>
                    </div>
                </div>

                <div>
                    <?= $this->Form->button(__('Edit Ingredient'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                    <?= $this->Form->postLink(
                        __('Delete Ingredient'),
                        ['action' => 'delete', $ingredient->id],
                        ['confirm' => __('Are you sure you want to delete ingredient {0}?', $ingredient->name), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']
                    ) ?>
                    <?= $this->Html->link(__('List Ingredient'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>

<br </br>

