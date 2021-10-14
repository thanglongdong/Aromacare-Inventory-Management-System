<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
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
                    <h1 class="h3 mb-2 text-aromacare"><?= __('View Suppliers') ?></h1>
                </div>

                <div>
                    <?= $this->Form->create($supplier) ?>
                </div>

                <div>
                    <!-- Row 1 -->
                    <div class="row">
                        <div class="col">
                            <?= $this->Form->control('name', ['empty' => true, 'disabled'])?>
                        </div>
                        <div class="col">
                            <?= $this->Form->control('phone', ['empty' => true, 'disabled'])?>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="row">
                        <div class="col-9">
                            <?= $this->Form->control('email', ['empty' => true, 'disabled'])?>
                        </div>
                        <div class="col-3">
                            <?= $this->Form->control('wait',['disabled'])?>
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div class="row">
                        <div class="col">
                            <?= $this->Form->control('address',['disabled'])?>
                        </div>
                    </div>

                    <br </br>
                    <?= $this->Form->end() ?>
                    <div>
                        <?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->id], ['class' => 'btn btn-aromacare']) ?>
                        <?= $this->Form->postLink(__('Delete Supplier'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id), 'class' => 'btn btn-outline-aromacare float-right mr-2']) ?>
                        <?= $this->Html->link(__('List Supplier'), ['action' => 'index'], ['class' => 'btn btn-outline-aromacare float-right mr-2']) ?>
                        <?= $this->Html->link(__('New Supplier'), ['action' => 'add'], ['class' => 'btn btn-outline-aromacare me-2 float-right mr-2']) ?>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <br></br>


<?php if (!empty($supplier->ingredients)) : ?>
    <div class="container">
        <h1 class="h3 mb-2 text-aromacare"><?= __('Related Ingredients') ?></h1>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Name') ?></th>
                    <th><?= __('Stock') ?></th>
                    <th><?= __('Price (AUD)') ?></th>
                    <th><?= __('Supplier Id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($supplier->ingredients as $ingredients) : ?>
                    <tr>
                        <td><?= h($ingredients->id) ?></td>
                        <td><?= h($ingredients->name) ?></td>
                        <td><?= h($ingredients->stock) ?></td>
                        <td><?= h($this->Number->currency($ingredients->price)) ?></td>
                        <td><?= h($ingredients->supplier_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Ingredients', 'action' => 'view', $ingredients->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Ingredients', 'action' => 'edit', $ingredients->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ingredients', 'action' => 'delete', $ingredients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingredients->id)]) ?>
                        </td>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div><br </br>
<?php endif; ?>
