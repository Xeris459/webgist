<?= $this->include('layout/head') ?>
<?= $this->include('layout/sidebar') ?>
<?= $this->include('layout/navbar') ?>

<div class="container-fluid">
    <!-- nama halaman dan untuk tombol -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= str_replace('-', ' ',$titleH) ?></h1>
    </div>

    <hr>
    <!-- content -->
    <?= $this->include('layout/notification_form'); ?>
    <?= $this->renderSection('content') ?>

</div>

<?= $this->include('layout/footer') ?>