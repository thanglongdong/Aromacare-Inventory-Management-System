<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipe[]|\Cake\Collection\CollectionInterface $recipes
 */
?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<!-- End of Tabs -->
<br>

<div class="container-fluid">
    <div class="mb-3 d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-aromacare"><?= __('Recipes') ?></h3>
        <a href="<?= $this->Url->build('/Recipes/recipeadd')?>" class="d-none d-sm-inline-block btn btn-aromacare"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Recipe</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="customTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th><?= h('ID') ?></th>
                <th><?= h('Method') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($recipes as $recipe): ?>
                <tr>
                    <td><?= $this->Number->format($recipe->id) ?></td>
                    <td><?= h($recipe->method) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'recipeview', $recipe->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'recipeedit', $recipe->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'recipedelete', $recipe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipe->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready( function () {
        $("#customTable").DataTable();
    } );
</script>
