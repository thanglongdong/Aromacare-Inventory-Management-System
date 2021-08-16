<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsIngredient[]|\Cake\Collection\CollectionInterface $productsIngredients
 */
?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<!-- End of Tabs -->
<br>

<div class="productsIngredients index content">
    <?= $this->Html->link(__('New Products Ingredient'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Products Ingredients') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('ingredient_id') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productsIngredients as $productsIngredient): ?>
                <tr>
                    <td><?= $this->Number->format($productsIngredient->id) ?></td>
                    <td><?= $productsIngredient->has('product') ? $this->Html->link($productsIngredient->product->name, ['controller' => 'Products', 'action' => 'view', $productsIngredient->product->id]) : '' ?></td>
                    <td><?= $productsIngredient->has('ingredient') ? $this->Html->link($productsIngredient->ingredient->name, ['controller' => 'Ingredients', 'action' => 'view', $productsIngredient->ingredient->id]) : '' ?></td>
                    <td><?= h($productsIngredient->amount) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $productsIngredient->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productsIngredient->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productsIngredient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsIngredient->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
