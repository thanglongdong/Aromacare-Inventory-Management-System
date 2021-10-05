<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe $recipe
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
                <h1 class="h3 mb-2 text-aromacare">Recipe <?= h($recipe->id) ?></h1>
            </div>

            <div>
                <table>
                    <div class="text">
                        <blockquote>
                            <?= $this->Text->autoParagraph($recipe->method)?>
                        </blockquote>
                    </div>
                </table>

                <div>
                    <?= $this->Html->link(__('Edit Recipe'), ['action' => 'recipeedit', $recipe->id], ['class' => 'btn btn-aromacare']) ?>
                    <?= $this->Form->postLink(__('Delete Recipe'), ['action' => 'recipedelete', $recipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id), 'class' => 'btn btn-outline-aromacare float-right mr-2']) ?>
                    <?= $this->Html->link(__('List Recipes'), ['action' => 'recipeindex'], ['class' => 'btn btn-outline-aromacare float-right mr-2']) ?>
                    <?= $this->Html->link(__('New Recipe'), ['action' => 'recipeadd'], ['class' => 'btn btn-outline-aromacare me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>

<br></br>

<?php if (!empty($recipe->products)) : ?>
    <div class="container">
        <h1 class="h3 mb-2 text-aromacare"><?= __('Related Product') ?></h1>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Name') ?></th>
                    <th><?= __('Type') ?></th>
                    <th><?= __('Price') ?></th>
                    <th><?= __('Size') ?></th>
                    <th><?= __('Stock') ?></th>
                    <th><?= __('Sku') ?></th>
                    <th><?= __('Description') ?></th>
                    <th><?= __('Image') ?></th>
                    <th><?= __('Recipe Id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($recipe->products as $products) : ?>
                    <tr>
                        <td><?= h($products->id) ?></td>
                        <td><?= h($products->name) ?></td>
                        <td><?= h($products->type) ?></td>
                        <td><?= h($products->price) ?></td>
                        <td><?= h($products->size) ?></td>
                        <td><?= h($products->stock) ?></td>
                        <td><?= h($products->sku) ?></td>
                        <td><?= h($products->description) ?></td>
                        <td><?= h($products->image) ?></td>
                        <td><?= h($products->recipe_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div><br </br>
<?php endif; ?>



