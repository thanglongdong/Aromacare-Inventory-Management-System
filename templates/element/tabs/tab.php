<?php
?>

<ul class="nav nav-tabs nav-fill">
    <li class="nav-item">
        <?php if($page == 'Products') : ?>
            <a class="nav-link active font-weight-bold link-success" href="<?= $this->Url->build('/products')?>"><strong class="text-success">Products</strong></a>
        <?php else : ?>
            <a class="nav-link link-success" href="<?= $this->Url->build('/products')?>">Products</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'Ingredients') : ?>
            <a class="nav-link active font-weight-bold link-success" href="<?= $this->Url->build('/ingredients')?>"><strong class="text-success">Ingredients</strong></a>
        <?php else : ?>
            <a class="nav-link link-success" href="<?= $this->Url->build('/ingredients')?>">Ingredients</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'Suppliers') : ?>
            <a class="nav-link active font-weight-bold link-success" href="<?= $this->Url->build('/suppliers')?>"><strong class="text-success">Suppliers</strong></a>
        <?php else : ?>
            <a class="nav-link link-success" href="<?= $this->Url->build('/suppliers')?>">Suppliers</a>
        <?php endif; ?>
    </li>
</ul>
