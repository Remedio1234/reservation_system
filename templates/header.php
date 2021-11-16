<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo (($data['title']) ? $data['title'] : @$data['site_title']);?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php if(isset($data['css'])) : ?>
            <?php foreach ($data['css'] as $key => $css) { ?>
                <link href="assets/<?php echo $css; ?>" rel="stylesheet">
            <?php } ?>
        <?php endif; ?>
        <link rel="shortcut icon" href="<?php echo WEB_ROOT . 'admin-panel/uploads/company/' . @$data['site_logo'] ?>" />
        <style>
            .badge {
                position: relative;
                top: -12px;
                left: -12px;
                border: 1px solid black;
                border-radius: 50%;
                font-size: 9px;
            }
        </style>
    </head>
    <body>
    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo WEB_ROOT ?>?v=home">
                <img src="<?php echo WEB_ROOT . 'admin-panel/uploads/company/' . @$data['site_logo'] ?>" width="50" height="50" class="d-inline-block align-top" alt=""> 
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($data['active']) && $data['active'] == 'home' ? 'active' : ''); ?>" href="<?php echo WEB_ROOT. '?v=home'?>">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php echo (isset($data['active']) && $data['active'] == 'about' ? 'active' : ''); ?>" href="<?php echo WEB_ROOT. '?v=about'?>">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($data['active']) && $data['active'] == 'contact' ? 'active' : ''); ?>" href="<?php echo WEB_ROOT ?>?v=contact-us">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($data['active']) && $data['active'] == 'services' ? 'active' : ''); ?>" href="<?php echo WEB_ROOT ?>?v=services">Services</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto" id="head-menu">
                    <li class="nav-item">
                        <a 
                            class="nav-link"
                            href="<?php echo WEB_ROOT ?>?v=items">
                            <i class="fa fa-shopping-cart fa-lg"></i>
                            <span class="badge badge-light total-count">0</span>
                        </a>
                    </li>
                    <?php if(!isset($_SESSION['customer']['isLoggedIn'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo (isset($data['active']) && $data['active'] == 'login' ? 'active' : ''); ?>" href="<?php echo WEB_ROOT ?>?v=login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo (isset($data['active']) && $data['active'] == 'register' ? 'active' : ''); ?>" href="<?php echo WEB_ROOT ?>?v=register">Register</a>
                        </li>
                    <?php else : ?>  
   
                        <li class="nav-item dropdown">
                            <a 
                                class="nav-link"
                                href="javascript://;" 
                                data-toggle="dropdown" 
                                id="update_notification_count"
                                aria-haspopup="true" 
                                aria-expanded="false">
                                <i class="fa fa-bell fa-lg"></i>
                                <span class="badge badge-light" id="notification_count">0</span>
                            </a>
                            <?php if(isset($_SESSION['customer']['isLoggedIn'])) : ?>
                                <div 
                                    id="notification_data"
                                    class="dropdown-menu" 
                                    aria-labelledby="account" 
                                    style="overflow:scroll; height:400px;"></div>
                            <?php endif ?>
                        </li>
                        <li class="nav-item dropdown">
                            <a 
                                class="nav-link dropdown-toggle"
                                href="javascript://;" 
                                id="account" 
                                data-toggle="dropdown" 
                                aria-haspopup="true" 
                                aria-expanded="false">
                                <i class="fa fa-user fa-lg"></i></a>
                            <div 
                                style="font-size:12px;"
                                class="dropdown-menu" 
                                aria-labelledby="account">
                                <a 
                                    class="dropdown-item" 
                                    href="<?php echo WEB_ROOT ?>?v=information">
                                        <i class="fa fa-smile-o" aria-hidden="true"></i> 
                                        Hello, <?php echo ucfirst(@$_SESSION['customer']['username']); ?>!</a>
                                <div class="dropdown-divider"></div>
                                <a 
                                    class="dropdown-item" 
                                    href="<?php echo WEB_ROOT ?>?v=dashboard"><i class="fa fa-angle-left" aria-hidden="true"></i> Dasboard </a>
                                <div class="dropdown-divider"></div>
                                <a 
                                    class="dropdown-item text-danger" 
                                    href="<?php echo WEB_ROOT. 'account/logout.php'?>"> <i class="fa fa-angle-left" aria-hidden="true"></i> Logout </a>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
