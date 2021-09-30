<?php
?>

<ul class="nav nav-tabs nav-fill">
    <li class="nav-item">
        <?php if($page == 'Dashboard') : ?>
            <a class="nav-link active font-weight-bold link-aromacare" href="<?= $this->Url->build('/')?>"><strong class="text-aromacare">Dashboard</strong></a>
        <?php else : ?>
            <a class="nav-link link-aromacare" href="<?= $this->Url->build('/')?>">Dashboard</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'Products') : ?>
            <a class="nav-link active font-weight-bold link-aromacare" href="<?= $this->Url->build('/products')?>"><strong class="text-aromacare">Products</strong></a>
        <?php else : ?>
            <a class="nav-link link-aromacare" href="<?= $this->Url->build('/products')?>">Products</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'Ingredients') : ?>
            <a class="nav-link active font-weight-bold link-aromacare" href="<?= $this->Url->build('/ingredients')?>"><strong class="text-aromacare">Ingredients</strong></a>
        <?php else : ?>
            <a class="nav-link link-aromacare" href="<?= $this->Url->build('/ingredients')?>">Ingredients</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'Suppliers') : ?>
            <a class="nav-link active font-weight-bold link-aromacare" href="<?= $this->Url->build('/suppliers')?>"><strong class="text-aromacare">Suppliers</strong></a>
        <?php else : ?>
            <a class="nav-link link-aromacare" href="<?= $this->Url->build('/suppliers')?>">Suppliers</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'ProductsIngredients') : ?>
            <a class="nav-link active font-weight-bold link-aromacare" href="<?= $this->Url->build('/products-ingredients')?>"><strong class="text-aromacare">Products Ingredients</strong></a>
        <?php else : ?>
            <a class="nav-link link-aromacare" href="<?= $this->Url->build('/products-ingredients')?>">Products Ingredients</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'Recipes') : ?>
            <a class="nav-link active font-weight-bold link-aromacare" href="<?= $this->Url->build('/recipes')?>"><strong class="text-aromacare">Recipes</strong></a>
        <?php else : ?>
            <a class="nav-link link-aromacare" href="<?= $this->Url->build('/recipes')?>">Recipes</a>
        <?php endif; ?>
    </li>
</ul>
