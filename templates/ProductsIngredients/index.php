

<?php

echo $this -> Html->css("/vendor/datatables/dataTables.bootstrap4.min.css",['block'=>true]);
echo $this -> Html->script("/vendor/datatables/jquery.dataTables.min.js",['block'=>true]);
echo $this -> Html->script("/vendor/datatables/dataTables.bootstrap4.min.js",['block'=>true]);
echo $this -> Html->script("/js/demo/datatables-demo.js",['block'=>true]);
?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<!-- End of Tabs -->
<br>

<div class="container">

    <div class="mb-3 d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-success"><?= __('Products Ingredients') ?></h3>
        <a href="<?= $this->Url->build('/ProductsIngredients/add')?>" class="d-none d-sm-inline-block btn btn-success"><i
                class="fas fa-plus fa-sm text-white-50"></i>New Products Ingredient</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('ID') ?></th>
                    <th><?= h('product_id') ?></th>
                    <th><?= h('ingredient_id') ?></th>
                    <th><?= h('amount') ?></th>
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
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productsIngredient->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productsIngredient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsIngredient->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
