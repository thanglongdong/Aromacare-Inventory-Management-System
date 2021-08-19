
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingredient[]|\Cake\Collection\CollectionInterface $ingredients
 */

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
        <h3 class="text-success"><?= __('Ingredients') ?></h3>
        <a href="<?= $this->Url->build('/ingredients/add')?>" class="d-none d-sm-inline-block btn btn-success"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Ingredient</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th><?= h('ID') ?></th>
                <th><?= h('Name') ?></th>
                <th><?= h('Stock') ?></th>
                <th><?= h('Price (AUD)') ?></th>
                <th><?= h('Supplier_ID') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($ingredients as $ingredient): ?>
                <tr>
                    <td><?= $this->Number->format($ingredient->id) ?></td>
                    <td><?= h($ingredient->name) ?></td>
                    <td><?= h($ingredient->stock) ?></td>
                    <td><?= $this->Number->currency($ingredient->price) ?></td>
                    <td><?= $ingredient->has('supplier') ? $ingredient->supplier->id : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ingredient->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ingredient->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ingredient->id], ['confirm' => __('Are you sure you want to delete ingredient {0}?', $ingredient->name)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
