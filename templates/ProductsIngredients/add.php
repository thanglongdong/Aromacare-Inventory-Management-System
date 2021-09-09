<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsIngredient $productsIngredient
 * @var \Cake\Collection\CollectionInterface|string[] $products
 * @var \Cake\Collection\CollectionInterface|string[] $ingredients
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
                <h1 class="h3 mb-2 text-success"><?= __('Add Products Ingredient') ?></h1>
            </div>
            <br </br>

            <div>
                <?= $this->Form->create($productsIngredient) ?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('product_id', ['options' => $products]) ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('ingredient_id', ['options' => $ingredients]) ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('amount') ?>
                    </div>
                </div>


                <br>
                <div>
                    <?= $this->Form->button(__('Add Ingredients'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Html->link(__('List Products Ingredients'), ['action' => 'index'], ['class' => 'btn btn-outline-success flex-shrink-0']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<br>
