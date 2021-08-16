<?php

?>

<!-- Navigation-->
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="<?= $this->Url->build('/') ?>" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <?= $this->Html->image('Aromacare_Normal_Logo.png', ['alt' => 'Aromacare Logo', 'style' => "width:202.5px;height:55.5px"]); ?>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="<?= $this->Url->build('/') ?>" class="nav-link px-2 link-success">Home</a></li>
            <li><a href="<?= $this->Url->build('/') ?>" class="nav-link px-2 link-success">About</a></li>
            <li><a href="<?= $this->Url->build('/dashboard') ?>" class="nav-link px-2 link-success">Dashboard</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <button class="btn btn-outline-success" type="submit">
                <i class="bi-cart-fill me-1"></i>
                Cart
                <span class="badge bg-success text-white ms-1 rounded-pill">0</span>
            </button>
        </div>
    </header>
</div>
