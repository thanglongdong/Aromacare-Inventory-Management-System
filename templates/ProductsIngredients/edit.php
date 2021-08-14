<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsIngredient $productsIngredient
 * @var string[]|\Cake\Collection\CollectionInterface $products
 * @var string[]|\Cake\Collection\CollectionInterface $ingredients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productsIngredient->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productsIngredient->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Products Ingredients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productsIngredients form content">
            <?= $this->Form->create($productsIngredient) ?>
            <fieldset>
                <legend><?= __('Edit Products Ingredient') ?></legend>
                <?php
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('ingredient_id', ['options' => $ingredients]);
                    echo $this->Form->control('amount');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
