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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <?= $this->Html->css('styles') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

<!--   THIS ONEEEEEE -->
    <?= $this->Html->css(['/vendor/fontawesome-free-5.15.4-web/css/all.min.css']) ?>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?= $this->fetch('script') ?>

    <!-- Bootstrap core JS-->
    <?= $this -> Html->script("https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js",['defer'=>true]); ?>
    <!-- Core theme JS-->
    <?= $this -> Html->script("scripts.js",['defer'=>true]); ?>
</head>

<!-- Navigation -->
<?= $this->element('navbar/nav') ?>
<!-- Main Content -->
<main class="main" >
    <div class="container-fluid">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>
<!-- Footer -->
<?= $this->element('footer/foot') ?>


