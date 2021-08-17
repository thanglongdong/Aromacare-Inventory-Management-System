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
                <h1 class="h3 mb-2 text-success"><?= __('Edit Suppliers') ?></h1>
            </div>
            <br>

            <div>
                <?= $this->Form->create($supplier,['novalidate' => true, 'type'=>'file']) ?>
                <?= $this->Form->control('name')?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('phone')?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('email') ?>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row">
                    <div class="col">
                    <?= $this->Form->control('address') ?>
                    </div>
                </div>
                <br>
                <div>
                    <?= $this->Form->button(__('Save Changes'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->end() ?>
                    <?= $this->Form->postLink(
                        __('Delete Supplier'),
                        ['action' => 'delete', $supplier->id],
                        ['confirm' => __('Are you sure you want to delete supplier {0}?', $supplier->name), 'class' => 'btn btn-outline-success float-right mr-2']
                    ) ?>
                    <?= $this->Html->link(__('List Suppliers'), ['action' => 'index'], ['class' => 'btn btn-outline-success me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
