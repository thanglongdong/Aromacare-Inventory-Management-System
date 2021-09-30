<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier[]|\Cake\Collection\CollectionInterface $suppliers
 */


?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<!-- End of Tabs -->
<br>

<div class="container-fluid">
    <div class="mb-3 d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-success"><?= __('Suppliers') ?></h3>
        <a href="<?= $this->Url->build('/suppliers/add')?>" class="d-none d-sm-inline-block btn btn-success"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Supplier</a>
    </div>
    <div class="table-responsive-lg">
        <table class="table table-bordered" id="suppliersTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th><?= h('ID') ?></th>
                <th><?= h('Name') ?></th>
                <th><?= h('Phone') ?></th>
                <th><?= h('Email') ?></th>
                <th><?= h('Average Wait Time (Days)') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?= $this->Number->format($supplier->id) ?></td>
                    <td><?= h($supplier->name) ?></td>
                    <td><?= h($supplier->phone) ?></td>
                    <td><?= h($supplier->email) ?></td>
                    <td><?= h($supplier->wait) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $supplier->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplier->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete this supplier {0}?', $supplier->name)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready( function () {
        $("#suppliersTable").DataTable();
    } );
</script>
