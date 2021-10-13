<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var string[]|\Cake\Collection\CollectionInterface $ingredients
 */

$this->loadHelper('Authentication.Identity');

$loggedin = $this->Identity->isLoggedIn();

if ($loggedin){
$role = $this->Identity->get('role');
$user_id=$this->Identity->get('id');
}

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
                <h1 class="h3 mb-2 text-aromacare"><?= __('Edit Product') ?></h1>
            </div>
            <br </br>

            <div>
                <?= $this->Form->create($product,['novalidate' => true, 'type'=>'file']) ?>
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
                <!-- Row 2 -->
                <div class="row">
                    <?php if($loggedin): ?>
                        <div class="col">
                            <?= $this->Form->control('recipe_id') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Row 3 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('ingredients._ids', [
                            'options'=>$ingredients,
                            'multiple'=>"multiple"
                        ]) ?>
                    </div>
                </div>

                <br </br>

                <div>
                    <?= $this->Form->button(__('Save Changes'), ['class' => 'btn btn-aromacare']) ?>
                    <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'btn btn-outline-aromacare flex-shrink-0']) ?>
                    <?= $this->Form->postLink(
                        __('Delete Product'),
                        ['action' => 'delete', $product->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'btn btn-outline-aromacare flex-shrink-0']
                    ) ?>
                </div>
            </div>

        </div>
    </div>

</div>


<?= $this->Form->end() ?>
<br>
<script>
    $(document).ready(function() {
        $('#ingredients-ids').select2();
    });
</script>
