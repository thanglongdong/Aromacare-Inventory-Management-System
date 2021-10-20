<?php

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
            <a href="<?= $this->Url->build('/products')?>" style="text-decoration: none;" class="card count border-left-primary shadow py-2">
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
            <a href="<?= $this->Url->build('/ingredients')?>" style="text-decoration: none" class="card count border-left-success shadow py-2">
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
            <a href="<?= $this->Url->build('/suppliers')?>" style="text-decoration: none" class="card count border-left-primary shadow py-2">
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

    <!-- Content Row 1 -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color: #158467; display: inline">Ingredients threshold trends</h6>
                    <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="right"  data-bs-html="true" title="<b>Graph relates ingredient's stock to it's threshold.</b> <br> If an ingredient's stock is below it's threshold, it is categorised as 'Below Threshold'. <br> If an ingredients stock is within 2 of it's threshold, then it is categorised as such - this follows for all categories and until all ingredients have been counted." style="display: inline;float: right"></i>
                </div>
                <div class="card-body">
                    <div id="barChart" style="height: 370px; width: 100%;"></div> <!-- canvas call -->
                    <br>
                </div>
            </div>

        </div>
        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold" style="color: #158467;display: inline">10 Ingredients closest to threshold</h6>
                    <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-html="true" title="<b>Chart shows the 10 ingredients closest to their thresholds.</b> <br> The highest ingredient is the closest to it's threshold and the lowest ingredient is furthest away from it's threshold."  style="display: inline;float: right"></i>
                </div>
                <div class="card-body">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div> <!-- canvas call -->
                    <br>
                </div>
            </div>

        </div>
    </div>


</div>


<script>
    window.onload = function() {

        var barChart = new CanvasJS.Chart("barChart", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light2",
            title: {
                text: "Ingredient threshold trends"
            },
            axisY: {
                title: "Number of Ingredients"
            },
            axisX: {
                title: "Distance from Threshold"
            },
            data: [{
                type: "column",
                yValueFormatString: "# Ingredients",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });

        var chartContainer = new CanvasJS.Chart("chartContainer", {
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            animationEnabled: true,
            exportEnabled: true,
            title: {
                text: "Ingredients closest to threshold"
            },
            axisX: {
                margin: 10,
                labelPlacement: "inside",
                tickPlacement: "inside",
                // title: "Ingredient Name"
            },
            axisY2: {
                title: "Stock away from threshold",
                includeZero: true,
                suffix: ""
            },
            data: [{
                type: "bar",
                axisYType: "secondary",
                yValueFormatString: "#",
                indexLabel: "{y}",
                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>

            }]
        });

        barChart.render();
        chartContainer.render();

    }
</script>
