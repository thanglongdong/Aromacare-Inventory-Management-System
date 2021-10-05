<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
$this->loadHelper('Authentication.Identity');

$loggedin = $this->Identity->isLoggedIn();

if ($loggedin){
$role = $this->Identity->get('role');
$user_id=$this->Identity->get('id');
};
$this -> Html->css("/webroot/datatables/dataTables.min.css",['block'=>true,'defer'=>true]);
$this -> Html->script("/webroot/datatables/dataTables.min.js",['block'=>true,'defer'=>true]);
?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>


<!-- End of Tabs -->
<br>

<div class="container-fluid">

    <div class="mb-3 d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-success"><?= __('Products') ?></h3>

        <div style="display: inline-block">
        <a href="<?= $this->Url->build('/Products/add')?>" class=" btn btn-success"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Product</a>
        <a href="<?= $this->Url->build('/Products/export')?>" class=" btn btn-success"><i
                class="fas fa-file-export fa-sm text-white-50"></i> Download</a>
        </div>
    </div>

    <div class="table-responsive-lg">
        <table class="table table-bordered" id="productsTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th><?= h('ID') ?></th>
                <th><?= h('Name') ?></th>
                <th><?= h('Type') ?></th>
                <th><?= h('Price (AUD)') ?></th>
                <th><?= h('Size (ml)') ?></th>
                <th><?= h('Stock') ?></th>
                <th><?= h('SKU') ?></th>
                <?php if($loggedin): ?>
                    <div class="col-md-3 text-end">
                        <th><?= h('Recipe') ?></th>
                    </div>
                <?php endif; ?>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $this->Number->format($product->id) ?></td>
                    <td><?= h($product->name) ?></td>
                    <td><?= h($product->type) ?></td>
                    <td><?= $this->Number->currency($product->price) ?></td>
                    <td><?= h($product->size) ?></td>
                    <td><?= $this->Number->format($product->stock) ?></td>
                    <td><?= h($product->sku) ?></td>
                    <?php if($loggedin): ?>
                    <div class="col-md-3 text-end">
                        <td><?= $this->Html->link($product->recipe_id, ['controller' => 'Recipes', 'action' => 'recipeview', $product->recipe_id]) ?></td>
                    </div>
                    <?php endif; ?>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete {0}?', $product->name)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready( function () {
        $("#productsTable").DataTable();
    } );
</script>
