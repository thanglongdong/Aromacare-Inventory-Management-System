<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
$inputQuantity = [
    'data' => [
        'result' => $this->request->getQuery('result'),
    ],
    'schema' => [
        'result'
    ]
];

$produceQuantity = [
    'data' => [
        'result' => $this->request->getQuery('produceResult'),
    ],
    'schema' => [
        'produceResult'
    ]
];
?>

<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1 text-success">SKU:<?= h($product->sku) ?></div>
                <h1 class="display-5 fw-bolder text-success"><?= h($product->name) ?></h1>
                <div class="fs-5 mb-5 text-success">
                    <span><?= $this->Number->currency($product->price) ?></span>
                </div>
                <p class="lead text-success"><?= h($product->description) ?></p>

                <br>
                <div class="row">
                    <?= $this->Form->create($inputQuantity, ['type' => 'get']) ?>
                    <div class="col"> 
                        <?= $this->Form->control('inputQuantity', ['label' => false,
                            'class' => 'form-control search-slt me-3','style'=>"width: 96px",
                            'placeholder' => '1','default'=>'0']); ?>
                        
                    </div>
                    <br>
                    <div class='col'>
                        <?= $this->Form->button(__('Purchase'), ['class'=>'btn btn-outline-success flex-shrink-0 me-1']) ?>
                    </div>

                    <?= $this->Form->end() ?>

                    <?= $this->Form->create($produceQuantity, ['type' => 'get']) ?>
                    <div class="col"> 
                        <?= $this->Form->control('produceQuantity', ['label' => false,
                            'class' => 'form-control search-slt me-3','style'=>"width: 96px",
                            'placeholder' => '1','default'=>'0']); ?>
                        
                    </div>
                    <br>
                    <div class='col'>
                        <?= $this->Form->button(__('Produce'), ['class'=>'btn btn-outline-success flex-shrink-0 me-1','style'=>"width: 96px"]) ?>
                    </div>

                    <?= $this->Form->end() ?>

                    <?php if($produceResult != null): ?>
                        <?php if($produceResult == 'invalid'): ?>
                            <h6 style="color:#AA2A0E;font-size:16px;text-align:center;font-weight:bold" >Please input a valid number</h6>
                        <?php elseif ($produceResult =='unsuccess'): ?>
                            <h5  style="color:#AA2A0E;font-size:16px;text-align:center;font-weight:bold" >Updated unsuccessfully. Please check the stock of ingredients. </h5>
                        <?php else : ?>
                            <h5  style="color:#198754;font-size:16px;text-align:center;font-weight:bold" >Stock updated successfully. The remaining stock is: <?=$produceResult?></h5>
                        <?php endif; ?>
                    <?php endif; ?>


                    <?php if($result != null): ?>
                        <?php if($result == 'unsuccess'): ?>
                            <h6 style="color:#AA2A0E;font-size:16px;text-align:center;font-weight:bold" >Please input a valid number</h6>
                        <?php else: ?>
                            <?php if($product->stock>0): ?>
                                <h5  style="color:#198754;font-size:16px;text-align:center;font-weight:bold" >Stock updated successfully. The remaining stock is: <?=$result?></h5>
                            <?php else: ?>
                                <h5  style="color:#AA2A0E;font-size:16px;text-align:center;font-weight:bold" >Stock updated successfully. The remaining stock is: <?=$result?></h5>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Related items section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Fancy Product</h5>
                            <!-- Product price-->
                            $40.00 - $80.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Special Item</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$20.00</span>
                            $18.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Sale Item</h5>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$50.00</span>
                            $25.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Popular Item</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            $40.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
