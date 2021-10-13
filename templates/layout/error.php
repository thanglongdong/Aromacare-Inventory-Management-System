<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <?= $this->Html->meta('icon') ?>

    <title>
        Aromacare
    </title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Core theme CSS (includes Bootstrap)-->
    <?= $this->Html->css('styles') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <!-- Bootstrap core JS-->
    <?= $this -> Html->script("https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js",['defer'=>true]); ?>
    <!-- Core theme JS-->
    <?= $this -> Html->script("scripts.js",['defer'=>true]); ?>
</head>
<body>
<!-- Navigation -->
<?= $this->element('navbar/nav') ?>
<!-- Main Content -->
<main>
    <br><br>
    <div style="text-align: center;">
        <h1 style="font-size: 18vh"><?=$code?></h1>
        <h3 style="font-size: 6vh">Looks like you're lost!</h3>
        <p style="font-size: 3vh">An error has occurred.</p>
        <?= $this->Html->link(__('Go Back'), 'javascript:history.back()', ['class' => 'btn btn-aromacare flex-shrink-0']) ?>
    </div>
</main>
<!-- Footer -->

</div>
</body>
<footer style="position: absolute; bottom: 0; width: 100%">
    <?= $this->element('footer/foot') ?>
</footer>
</html>
