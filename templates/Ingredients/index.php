
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingredient[]|\Cake\Collection\CollectionInterface $ingredients
 */

?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<!-- End of Tabs -->
<br>


<div class="container-fluid">
    <div class="mb-3 d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-aromacare"><?= __('Ingredients') ?></h3>

        <div style="display: inline-block">
            <a href="<?= $this->Url->build('/Ingredients/add')?>" class=" btn btn-aromacare"><i
                    class="fas fa-plus fa-sm text-white-50"></i> New Ingredient</a>
            <a href="<?= $this->Url->build('/Ingredients/export')?>" class=" btn btn-aromacare"><i
                    class="fas fa-download fa-sm text-white-50"></i> Download</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="customTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th><?= h('ID') ?></th>
                <th><?= h('Name') ?></th>
                <th><?= h('Stock') ?></th>
                <th><?= h('Price (AUD)') ?></th>
                <th><?= h('Threshold') ?></th>
                <th><?= h('Supplier') ?></th>
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
                    <td><?= h($ingredient->threshold) ?></td>
                    <td><?= $ingredient->has('supplier') ? $ingredient->supplier->name : '' ?></td>
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
<script>
    $(document).ready( function () {
        $("#customTable").DataTable();
    } );
</script>
