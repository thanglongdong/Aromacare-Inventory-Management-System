<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingredient $ingredient
 * @var string[]|\Cake\Collection\CollectionInterface $suppliers
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ingredient->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ingredient->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Ingredients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ingredients form content">
            <?= $this->Form->create($ingredient) ?>
            <fieldset>
                <legend><?= __('Edit Ingredient') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('stock');
                    echo $this->Form->control('price');
                    echo $this->Form->control('supplier_id', ['options' => $suppliers]);
                    echo $this->Form->control('products._ids', ['options' => $products]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
