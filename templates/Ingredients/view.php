<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingredient $ingredient
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
                <h1 class="h3 mb-2 text-aromacare"><?= h($ingredient->name) ?></h1>
                <?= $this->Form->create($ingredient) ?>
            </div>

            <div>
                <?= $this->Form->control('name',['disabled'])?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('stock',['disabled'])?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('threshold',['disabled'])?>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('price',['label'=>'Price (AUD)','disabled'])?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('supplier_id', ['options' => $suppliers, 'disabled'])?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
                <br>
                <div>
                    <?= $this->Html->link(__('Edit Ingredient'), ['action' => 'edit', $ingredient->id], ['class' => 'btn btn-aromacare']) ?>
                    <?= $this->Form->postLink(__('Delete Ingredient'), ['action' => 'delete', $ingredient->id], ['confirm' => __('Are you sure you want to delete ingredient {0}?', $ingredient->name), 'class' => 'btn btn-outline-aromacare float-right mr-2']) ?>
                    <?= $this->Html->link(__('List Ingredient'), ['action' => 'index'], ['class' => 'btn btn-outline-aromacare float-right mr-2']) ?>
                    <?= $this->Html->link(__('New Ingredient'), ['action' => 'add'], ['class' => 'btn btn-outline-aromacare me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>

<br>
