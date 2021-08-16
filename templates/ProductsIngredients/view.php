<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsIngredient $productsIngredient
 */
?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<!-- End of Tabs -->
<br>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Products Ingredient'), ['action' => 'edit', $productsIngredient->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Products Ingredient'), ['action' => 'delete', $productsIngredient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsIngredient->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Products Ingredients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Products Ingredient'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productsIngredients view content">
            <h3><?= h($productsIngredient->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $productsIngredient->has('product') ? $this->Html->link($productsIngredient->product->name, ['controller' => 'Products', 'action' => 'view', $productsIngredient->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Ingredient') ?></th>
                    <td><?= $productsIngredient->has('ingredient') ? $this->Html->link($productsIngredient->ingredient->name, ['controller' => 'Ingredients', 'action' => 'view', $productsIngredient->ingredient->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= h($productsIngredient->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productsIngredient->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
