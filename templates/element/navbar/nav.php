<?php
$this->loadHelper('Authentication.Identity');

$loggedin = $this->Identity->isLoggedIn();

if ($loggedin){
$role = $this->Identity->get('role');
$user_id=$this->Identity->get('id');
}
?>

<!-- Navigation-->
<div class="container-fluid">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="<?= $this->Url->build('/') ?>" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <?= $this->Html->image('Aromacare_Normal_Logo.png', ['alt' => 'Aromacare Logo', 'style' => "width:202.5px;height:55.5px"]); ?>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

            <li><a href="<?= $this->Url->build('/') ?>" class="nav-link px-2 link-aromacare">Dashboard</a></li>
            <li><a href="<?= $this->Url->build('/') ?>" class="nav-link px-2 link-aromacare">Documentation</a></li>

        </ul>
        <?php if($loggedin): ?>
            <?php if($role=='admin'): ?>
                <div class="col-md-3 text-end">
                <a href="<?= $this->Url->build(['controller'=>'users','action'=>'logout'])?>" style="margin-right:10px" class="btn btn-outline-aromacare me-2">Logout</a>
                </div>

            <?php elseif($role=='owner'): ?>

                <div class="col-md-3 text-end">
                <a href="<?= $this->Url->build(['controller'=>'users','action'=>'logout'])?>" style="margin-right:10px" class="btn btn-outline-aromacare me-2">Logout</a>
                <a href="<?= $this->Url->build(['controller'=>'users','action'=>'add'])?>" style="margin-right:10px" class="btn btn-aromacare me-2">Add Account</a>
                </div>


            <?php endif; ?>



        <?php else : ?>
            <div class="col-md-3 text-end">
            <a href="<?= $this->Url->build(['controller'=>'users','action'=>'login'])?>" style="margin-right:10px" class="btn btn-outline-aromacare me-2">Login</a>
            </div>

        <?php endif; ?>


    </header>
</div>
