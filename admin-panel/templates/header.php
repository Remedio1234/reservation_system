    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo (($data['title']) ? $data['title'] : @$data['site_title'] );?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php if(isset($data['css'])) : ?>
            <?php foreach ($data['css'] as $key => $css) { ?>
                <link href="assets/<?php echo $css; ?>" rel="stylesheet">
            <?php } ?>
        <?php endif; ?>
        <link rel="shortcut icon" href="<?php echo WEB_ROOT . 'admin-panel/uploads/company/' . @$data['site_logo'] ?>" />
    </head>
    <body class="fixed-nav sticky-footer bg-light" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
        <a class="navbar-brand" href="<?php echo WEB_ROOT. 'admin-panel/?v=dashboard'; ?>">
        <img src="<?php echo WEB_ROOT.'admin-panel/uploads/company/'. @$data['site_logo'] ?>" width="40" height="40" class="d-inline-block align-top" alt="">
    
        <?php echo @$data['site_title']; ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            
        <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'dashboard' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="<?php echo WEB_ROOT. 'admin-panel/?v=dashboard'; ?>">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Dashboard</span>
            </a>
            </li>
            
            <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'category' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Events">
            <a class="nav-link" href="<?php echo WEB_ROOT. 'admin-panel/?v=category'; ?>">
                <i class="fa fa-fw fa fa-hand-o-right"></i>
                <span class="nav-link-text">Category</span>
            </a>
            </li>
            
            <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'amenities' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Venues">
            <a class="nav-link" href="<?php echo WEB_ROOT. 'admin-panel/?v=amenities'; ?>">
                <i class="fa fa-fw fa-home"></i>
                <span class="nav-link-text">Amenities</span>
            </a>
            </li>

            

            <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'customers' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Customers">
            <a class="nav-link" href="<?php echo WEB_ROOT . 'admin-panel/?v=customers'; ?>">
                <i class="fa fa-fw fa-vcard-o"></i>
                <span class="nav-link-text">Customers</span>
            </a>
            </li>

            <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'reservations' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Reservations">
            <a class="nav-link" href="<?php echo WEB_ROOT. 'admin-panel/?v=reservations'; ?>">
                <i class="fa fa-fw fa-share-square-o"></i>
                <span class="nav-link-text">Reservations</span>
            </a>
            </li>

            <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'caterers' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Caterers">
            <a class="nav-link" href="<?php echo WEB_ROOT. 'admin-panel/?v=caterers'; ?>">
                <i class="fa fa-fw fa-users"></i>
                <span class="nav-link-text">Users</span>
            </a>
            </li>
            
            <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'settings' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="<?php echo WEB_ROOT. 'admin-panel/?v=settings'; ?>">
                <i class="fa fa-fw fa-cogs"></i>
                <span class="nav-link-text">Settings</span>
            </a>
            </li>
            

            <li class="nav-item <?php echo (isset($data['active']) && $data['active'] == 'reports' ? 'active' : ''); ?>" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="<?php echo WEB_ROOT. 'admin-panel/?v=reports'; ?>">
                <i class="fa fa-fw fa-area-chart"></i>
                <span class="nav-link-text">Reports</span>
            </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link text-danger"  data-toggle="modal" data-target="#logoutModal">
            <i class="fa fa-fw fa-sign-out"></i>
                <span class="nav-link-text">Logout</span>
            </a>
            </li>
            
            
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
            <!-- <a class="nav-link text-center" id="sidenavToggler">
                <i class="fa fa-fw fa-angle-left"></i>
            </a> -->
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            
        <li class="nav-item">
            <a class="nav-link">
            Welcome, <?php echo ucfirst($_SESSION['user']['username']); ?>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-danger" data-toggle="modal" data-target="#logoutModal">
                Logout <i class="fa fa-fw fa-sign-out"></i>
            </a>
            </li>
        </ul>
        </div>
    </nav>
    <div class="content-wrapper">