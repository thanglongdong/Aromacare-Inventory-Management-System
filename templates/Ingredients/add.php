
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingredient $ingredients
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
                <h1 class="h3 mb-2 text-gray-800"><?= __('New Ingredient') ?></h1>
            </div>

            <div>
                <?= $this->Form->create($ingredient,['novalidate' => true, 'type'=>'file']) ?>
                <?= $this->Form->control('name')?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('stock')?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('price',['label'=>'Price'])?>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="row">
    
                    <div class="col">
                        <?= $this->Form->control('supplier_id', ['options' => $suppliers, 'empty' => true])?>
                    </div>
                </div>

        

                <div>
                    <?= $this->Form->button(__('Add Ingredient'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('List Ingredients'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<br </br>
