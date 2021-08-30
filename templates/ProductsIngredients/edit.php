
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsIngredient $productsIngredient
 * @var string[]|\Cake\Collection\CollectionInterface $products
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
                <h1 class="h3 mb-2 text-success"><?= __('Edit Products Ingredients') ?></h1>
            </div>
            <br </br>
            <div>
                <?= $this->Form->create($productsIngredient,['novalidate' => true, 'type'=>'file']) ?>
                <?php
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('ingredient_id', ['options' => $ingredients]);
                    echo $this->Form->control('amount');
                ?>

                <br>

                <div>
                    <?= $this->Form->button(__('Save Changes'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->end() ?>
                    <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $productsIngredient->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $productsIngredient->id), 'class' => 'btn btn-outline-success float-right mr-2']
                    ) ?>
                    <?= $this->Html->link(__('List Products Ingredients'), ['action' => 'index'], ['class' => 'btn btn-outline-success float-right mr-2']) ?>

                </div>
            </div>

        </div>
    </div>

</div>

<br </br>

