 <div class="col-lg-3">
    <div class="list-group">
    <a href="<?php echo WEB_ROOT ?>?v=dashboard" class="list-group-item <?php echo (isset($data['active']) && $data['active'] == 'dashboard' ? 'active' : ''); ?>"><span class="fa fa-fw fa-dashboard"></span> Dashboard</a>
    <a href="<?php echo WEB_ROOT ?>?v=information" class="list-group-item <?php echo (isset($data['active']) && $data['active'] == 'information' ? 'active' : ''); ?>"><span class="fa fa-fw fa-info"></span> Personal Details</a>
    <a href="<?php echo WEB_ROOT ?>?v=account" class="list-group-item <?php echo (isset($data['active']) && $data['active'] == 'account' ? 'active' : ''); ?>"><span class="fa fa-fw fa-lock"></span>Change Password</a>
    <a href="<?php echo WEB_ROOT ?>?v=reservations" class="list-group-item <?php echo (isset($data['active']) && $data['active'] == 'reservations' ? 'active' : ''); ?>"><span class="fa fa-fw fa-calendar-check-o"></span> Reservations</a>
    <a href="<?php echo WEB_ROOT . 'account/logout.php' ?>" class="list-group-item text-danger"><span class="fa fa-fw fa-sign-out"></span> Logout</a>
    </div>
</div>
<!-- /.col-lg-3 -->