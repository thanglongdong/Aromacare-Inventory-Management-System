<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var string[]|\Cake\Collection\CollectionInterface $ingredients
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
                <h1 class="h3 mb-2 text-success"><?= h($product->name) ?></h1>
                <?= $this->Form->create($product) ?>
            </div>
            <div>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('name',['disabled']) ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('stock',['disabled']) ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('sku',['label'=>'SKU',['disabled']]) ?>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('type',['disabled']) ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('price',['disabled']) ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('size',['disabled']); ?>
                    </div>
                </div>

                <?= $this->Form->control('description',['disabled']) ?>
                <br </br>

                <div>
                    <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->postLink(
                        __('Delete Product'),
                        ['action' => 'delete', $product->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'btn btn-outline-success flex-shrink-0']
                    ) ?>
                    <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'btn btn-outline-success flex-shrink-0']) ?>
                    <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'btn btn-outline-success flex-shrink-0']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<br </br>
<br </br>


<?php if (!empty($product->ingredients)) : ?>
    <div class="container">
        <h1 class="h3 mb-2 text-success"><?= __('Ingredients') ?></h1>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Name') ?></th>
                    <th><?= __('Stock') ?></th>
                    <th><?= __('Price') ?></th>
                    <th><?= __('Supplier Id') ?></th>
                </tr>
                <?php foreach ($product->ingredients as $ingredients) : ?>
                    <tr>
                        <td><?= h($ingredients->id) ?></td>
                        <td><?= h($ingredients->name) ?></td>
                        <td><?= h($ingredients->stock) ?></td>
                        <td><?= h($ingredients->price) ?></td>
                        <td><?= h($ingredients->supplier_id) ?></td>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <br </br>
<?php endif; ?>




