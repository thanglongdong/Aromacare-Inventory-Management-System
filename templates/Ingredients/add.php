<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingredient $ingredients
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
                <h1 class="h3 mb-2 text-aromacare"><?= __('New Ingredient') ?></h1>
            </div>
            <br>
            <div>
                <?= $this->Form->create($ingredient,['novalidate' => true, 'type'=>'file']) ?>

                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('name')?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('supplier_id', ['options' => $suppliers, 'empty' => true])?>
                    </div>
                </div>

                <!-- Row 2 -->

                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('stock')?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('price',['label'=>'Price (AUD)'])?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('threshold')?>
                    </div>
                </div>

                <!-- Row 2 -->

                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('products._ids', ['options' => $products, 'empty' => true])?>
                    </div>
                </div>


                <br>

                <div>
                    <?= $this->Form->button(__('Add Ingredient'), ['class' => 'btn btn-aromacare']) ?>
                    <?= $this->Html->link(__('List Ingredients'), ['action' => 'index'], ['class' => 'btn btn-outline-aromacare me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<br </br>

<script>
    $(document).ready(function() {
        $('#products-ids').select2();
    });
</script>
