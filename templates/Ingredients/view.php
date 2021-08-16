
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ingredient $ingredient
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
                <h1 class="h3 mb-2 text-gray-800"><?= h($ingredient->name) ?></h1>
                <?= $this->Form->create($ingredient) ?>
            </div>

            <div>
                <?= $this->Form->control('name',['disabled'])?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('stock',['disabled'])?>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('price',['disabled'])?>
                    </div>
                    <div class="col">
                        <?= $ingredient->has('supplier') ? $this->Form->control($ingredient->supplier->name,['disabled']) : '' ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
                <div>
                    <?= $this->Html->link(__('Edit Ingredient'), ['action' => 'edit', $ingredient->id], ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->postLink(__('Delete Ingredient'), ['action' => 'delete', $ingredient->id], ['confirm' => __('Are you sure you want to delete ingredient {0}?', $ingredient->name), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
                    <?= $this->Html->link(__('List Ingredient'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
                    <?= $this->Html->link(__('New Ingredient'), ['action' => 'add'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>

<br></br>

