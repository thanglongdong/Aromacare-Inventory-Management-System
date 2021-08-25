<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \Cake\Collection\CollectionInterface|string[] $ingredients
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
                <h1 class="h3 mb-2 text-success"><?= __('New Product') ?></h1>
            </div>
            <br </br>

            <div>
                <?= $this->Form->create($product,['novalidate' => true]) ?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('name') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('stock') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('sku',['label'=>'SKU']) ?>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('type',
                            ['options' =>
                                ['Aromatherapy Accessories and Diffusers'=>'Aromatherapy Accessories and Diffusers',
                                    'Essential Oil Blends'=>'Essential Oil Blends',
                                    'Essential Oils'=>'Essential Oils',
                                    'Skin Care'=>'Skin Care',
                                    'Personal and Home'=>'Personal and Home',
                                    'Lifestyle'=>'Lifestyle',
                                    'Dementia Care'=>'Dementia Care',
                                    'Palliative Care'=>'Palliative Care',
                                    'Aged Care'=>'Aged Care']
                            ]) ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('price',['label'=>'Price (AUD)']) ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('size',['label'=>'Size (ml)']); ?>
                    </div>
                </div>
                <!-- Row 3 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('description') ?>
                    </div>
                </div>
                <!-- Row 4 -->
                <div>Select Ingredients In This Product</div> <!-- this should just go above whatever the final ingredients section is so that the process makes sense-->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->multiCheckbox('ingredients', $ingredients, ['multiple' => 'checkbox']) ?>
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">Grass</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">Tea</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option3">
                    <label class="form-check-label" for="inlineCheckbox1">Myrrh Oil</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option4">
                    <label class="form-check-label" for="inlineCheckbox2">Marjoram</label>
                </div>
                <br>

                <div>
                    <?= $this->Form->button(__('Add Product'), ['class' => 'btn btn-success']) ?>
                    <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'btn btn-outline-success flex-shrink-0']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<br>
