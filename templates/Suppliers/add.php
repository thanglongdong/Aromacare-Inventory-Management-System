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
                <h1 class="h3 mb-2 text-success"><?= __('New Supplier') ?></h1>
            </div>
            <div>
                <?= $this->Form->create($supplier,['novalidate' => true]) ?>
                <?= $this->Form->control('name') ?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('phone',['label'=>'Phone Number']) ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('email') ?>
                    </div>
                </div>
                <div class="col">
                    <?= $this->Form->control('address'); ?>
                </div>
                <br>
                <div>
                    <?= $this->Form->button(__('Add Supplier'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Html->link(__('List Suppliers'), ['action' => 'index'], ['class' => 'btn btn-outline-success me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<br>
