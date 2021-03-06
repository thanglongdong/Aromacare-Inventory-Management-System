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
                <h1 class="h3 mb-2 text-aromacare"><?= __('Edit Recipe') ?></h1>
            </div>
            <br </br>
            <div>
                <?= $this->Form->create($recipe,['novalidate' => true, 'type'=>'file']) ?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('method')?>
                    </div>
                </div>
                <br>
                <div>
                    <?= $this->Form->button(__('Save Changes'), ['class' => 'btn btn-aromacare']) ?>
                    <?= $this->Form->end() ?>
                    <?= $this->Form->postLink(
                        __('Delete Recipe'),
                        ['action' => 'recipedelete', $recipe->id],
                        ['confirm' => __('Are you sure you want to delete ingredient {0}?', $recipe->id), 'class' => 'btn btn-outline-aromacare float-right mr-2']
                    ) ?>
                    <?= $this->Html->link(__('List Recipes'), ['action' => 'recipeindex'], ['class' => 'btn btn-outline-aromacare me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#method' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>

<br </br>
