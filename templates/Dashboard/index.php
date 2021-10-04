<?php

echo $this->Html->script("https://canvasjs.com/assets/script/canvasjs.min.js");

debug($ingredients);
//exit();

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
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Supplier count -->
        <div class="col-xl">
            <a href="<?= $this->Url->build('/suppliers')?>" style="text-decoration: none" class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Number of Suppliers</div>
                            <div style="color: black" class="h5 mb-0 font-weight-bold text-gray-800 counter" data-target="<?= $supplier ?>">0</div>
                        </div>
                        <div class="col-auto">
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
                        <?= $this->Form->create($ingredients,['novalidate' => true, 'type'=>'file']) ?>
                        <div>
                            <?= $this->Form->control('name', ['options' => $ingredients]) ?>
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
                        <?= $this->Form->end() ?>
                    </div>

                </div>
            </div>
        </div>

    <!-- Toast -->
    <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fas fa-globe"></i>
                <strong class="me-auto"> &emsp; System Notification</strong>
                <small>Just Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Ingredient threshold met! An email has been sent.
            </div>
        </div>
    </div>


</div>
