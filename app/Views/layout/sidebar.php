<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
                <div class="sidebar-brand-text mx-3">
                    <?= ADMIN_DASHBOARD ?>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url() ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MENU
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('map/') ?>">
                    <i class="fas fa-fw fa-globe-asia"></i>
                    <span>Map</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('category/') ?>">
                    <i class="fas fa-fw fa-tag"></i>
                    <span>Category</span>
                </a>
            </li>

            <?php if (in_groups('super admin') || in_groups('admin')) : ?>
            <div class="sidebar-heading">
                Website Setting
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Mannage"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Manage</span>
                </a>
                <div id="Mannage" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage</h6>
                        <a class="collapse-item" href="<?= base_url('admin') ?>">Admin</a>
                        <a class="collapse-item" href="<?= base_url('user') ?>">User</a>
                    </div>
                </div>
            </li>
            <?php endif ?>
        </ul>
        <!-- End of Sidebar -->