<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT. 'admin-panel/?v=dashboard'?>">Dashboard</a></li>
    <li class="breadcrumb-item active">Settings</li>
    </ol>
    
    <div class="row">
        <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'): ?>
        <div class="col-lg-3">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="text-center">
                    <h4>Company Profile</h4>
                    </div>
                </div>
                <div class="card-body">
                    <center><span class="fa fa-fw fa-gear" style="font-size:10em;"></span></center>
                    <div class="table-responsive">
                    <a href="javascript:void(0);" class="btn btn-primary btn-block" id="editProfile"><span class="fa fa-fw fa-pencil"></span> Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>    
        <div class="col-lg-3">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="text-center">
                    <h4>My Account</h4>
                    </div>
                </div>
                <div class="card-body">
                <center><span class="fa fa-fw fa-key" style="font-size:10em;"></span></center>
                    <div class="table-responsive  text-center">
                        <a href="javascript:void(0);" class="btn btn-primary btn-block" id="editAccount"><span class="fa fa-fw fa-pencil"></span>  Edit Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid-->
<?php if (isset($data['page'])) if (file_exists('pages/modals/'. $data['page'] .'_modal.php')) include('pages/modals/'. $data['page'] .'_modal.php');?>	
  
