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
                <h1 class="h3 mb-2 text-aromacare"><?= __('Edit Supplier') ?></h1>
            </div>
            <br>

            <div>
                <?= $this->Form->create($supplier,['novalidate' => true]) ?>

                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('name') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('phone',['label'=>'Phone Number']) ?>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row">
                    <div class="col-9">
                        <?= $this->Form->control('email') ?>
                    </div>
                    <div class="col-3">
                        <?= $this->Form->control('wait'); ?>
                    </div>
                </div>
                <!-- Row 3 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('address'); ?>
                    </div>
                </div>

                <br>
                <div>
                    <?= $this->Form->button(__('Add Supplier'), ['class' => 'btn btn-aromacare']) ?>
                    <?= $this->Html->link(__('List Suppliers'), ['action' => 'index'], ['class' => 'btn btn-outline-aromacare me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
