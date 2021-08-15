<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>

<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<p></p>
<!-- End of Tabs -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h1 class="h3 mb-2 text-gray-800"><?= __('New Supplier') ?></h1>
            </div>


            <div>
                <?= $this->Form->create($supplier,['novalidate' => true, 'type'=>'file']) ?>
                <?= $this->Form->control('name') ?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('Phone Number') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('Email') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('Address'); ?>
                    </div>
                </div>

                <div>
                    <?= $this->Form->button(__('Add Supplier'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('List Suppliers'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<br </br>

<!-- this is all the old stuff that was there before
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Suppliers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="suppliers form content">
            <?= $this->Form->create($supplier) ?>
            <fieldset>
                <legend><?= __('Add Supplier') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('email');
                    echo $this->Form->control('address');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div> -->
