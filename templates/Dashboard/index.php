<?php

use Cake\ORM\TableRegistry;
use Cake\I18n\FrozenTime;

echo $this -> Html->css("//cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css",['block'=>true]);
echo $this -> Html->script("//cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js",['block'=>true]);
echo $this -> Html->script("/vendor/datatables/jquery.dataTables.min.js",['block'=>true]);
echo $this -> Html->script("/vendor/datatables/dataTables.bootstrap4.min.js",['block'=>true]);
echo $this -> Html->script("/js/demo/datatables-demo.js",['block'=>true]);

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

$now = FrozenTime::now();

$beforeNow = 0;
$afterNow = 0;
$today = 0;
$lastWeek = 0;
$thisWeek = 0;
$nextWeek = 0;
$future = 0;

foreach ($ingredient as $eachingredient) {
    $time = $eachingredient->order_date;

    if($time->isToday()){
        $today++;
    }
    if($time < $now){
        //everything before this second
        $beforeNow++;
    }
    if($time > $now){
        //everything after this second
        $afterNow++;
    }
    if($time->wasWithinLast('1 week')){
        //everything in last week
        $lastWeek++;
    }
    if($time->isWithinNext('1 week')){
        $thisWeek++;
    }
    if($time->isWithinNext('2 weeks')){
        $nextWeek++;
    }
    if($time->isWithinNext('2 weeks')){
        $future++;
    }
}

$lastWeek = $lastWeek - $today;
$before = $beforeNow - $today - $lastWeek; //cant include today or last week
$nextWeek = $nextWeek - $thisWeek;
$thisWeek = $thisWeek + $today;
$after = $afterNow - $future; //cant include today

$dataPoints = array( //data points for bar chart
    array("y" => $before, "label" => "Previous" ),
    array("y" => $lastWeek, "label" => "Last Week" ),
    array("y" => $thisWeek, "label" => "This Week" ),
    array("y" => $nextWeek, "label" => "Next Week" ),
    array("y" => $after, "label" => "After" )
);
?>

<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<!-- End of Tabs -->

<script>
    window.onload = function() {

        var chart1 = new CanvasJS.Chart("columnChart", {
            animationEnabled: true,
            theme: "light2",
            axisY: {
                title: "Number of Ingredients Ordered"
            },
            data: [{
                type: "column",
                yValueFormatString: "Number of Orders",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });

        chart1.render();
    }
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <br>

    <!-- Content Row -->
    <div class="row">
        <!-- product count -->
        <div class="col-xl">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Number of Products</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= h($product) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-home fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ingredient count -->
        <div class="col-xl">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Number of Ingredients</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= h($ingredient) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-microphone-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Supplier count -->
        <div class="col-xl">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Number of Suppliers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= h($supplier) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-utensils fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
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
                            <?= $this->Form->control('ingredients._ids', ['options' => $ingredients]) ?>
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
                            <?= $this->Form->button(__('Save Changes'), ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
