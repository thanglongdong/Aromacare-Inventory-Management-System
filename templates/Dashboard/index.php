<?php

use Cake\ORM\TableRegistry;

echo $this->Html->script("https://canvasjs.com/assets/script/canvasjs.min.js");

$products = TableRegistry::getTableLocator()->get('Products');
$ingredients = TableRegistry::getTableLocator()->get('Ingredients');
$suppliers = TableRegistry::getTableLocator()->get('Suppliers');

$product = $products
    ->find()
    ->all()
    ->count();
$ingredient = $ingredients
    ->find()
    ->all()
    ->count();
$supplier = $suppliers
    ->find()
    ->all()
    ->count();

?>

<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<!-- End of Tabs -->


<!-- Begin Page Content -->
<div class="container-fluid">

    <br>

    <!-- Content Row -->
    <div class="row">
        <!-- product count -->
        <div class="col-xl">
            <a href="<?= $this->Url->build('/products')?>" style="text-decoration: none" class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Number of Products</div>
                            <div style="color: black" class="h5 mb-0 font-weight-bold text-gray-800 counter" data-target="<?= $product ?>">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-home fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- ingredient count -->
        <div class="col-xl">
            <a href="<?= $this->Url->build('/ingredients')?>" style="text-decoration: none" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Number of Ingredients</div>
                            <div style="color: black" class="h5 mb-0 font-weight-bold text-gray-800 counter" data-target="<?= $ingredient ?>">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-microphone-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Supplier count -->
        <div class="col-xl">
            <a href="<?= $this->Url->build('/ingredients')?>" style="text-decoration: none" class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Number of Suppliers</div>
                            <div style="color: black" class="h5 mb-0 font-weight-bold text-gray-800 counter" data-target="<?= $supplier ?>">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-utensils fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <br>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold" style="color: #158467">Order Size Tracking</h6>
                    </div>
                    <div class="card-body">
                        <div id="columnChart" style="height: 370px; width: 100%;"></div> <!-- canvas call -->
                        <br>
                    </div>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold" style="color: #158467">Update Ingredient Order Threshold</h6>
                    </div>
                    <div class="card-body">
                        <div>
                            <h7 class="m-0 font-weight-bold">Select Ingredient</h7>
                        </div>
                        <div>
<!--                            --><?//= $this->Form->control('ingredients._ids', ['options' => $ingredients]) ?>
                        </div>
                        <br>
                        <div>
                            <h8 class="m-0 font-weight-bold">Set Threshold For Re-Order Notification</h8>
                        </div>
                        <div>
                            <?= $this->Form->control('threshold') ?>
                        </div>
                        <br>
                        <div>
                            <h9 class="m-0 font-weight-bold">Confirm Ingredient Threshold</h9>
                        </div>
                        <div>
                            <?= $this->Form->button(__('Save Changes'), ['class' => 'btn btn-aromacare']) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
