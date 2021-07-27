<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT. 'admin-panel/?v=dashboard'?>">Dashboard</a></li>
    <li class="breadcrumb-item active">Settings</li>
    </ol>

    <?php if(isset($_GET['page'])) : ?>

    <?php switch ($_GET['page']) {
        case 'customers':
            include_once("pages/reports/customers.php");
        break;

        case 'amenities':
            include_once("pages/reports/amenities.php");
        break;

        // case 'events':
        //     include_once("pages/reports/events.php");
        // break;

        // case 'caterers':
        //     include_once("pages/reports/caterers.php");
        // break;

        case 'reservations':
            include_once("pages/reports/reservations.php");
        break;
        
        default: break;
    }?>
    <?php else : ?>
    
    <div class="row">
        <!-- <div class="col-lg-3">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="text-center">
                    <h4>Customers</h4>
                    </div>
                </div>
                <div class="card-body">
                    <center><span class="fa fa-fw fa-vcard-o" style="font-size:10em;"></span></center>
                    <div class="table-responsive">
                        <a href="<?php echo  WEB_ROOT . 'admin-panel/?v=reports&page=customers';?>" 
                        class="btn btn-primary btn-lg btn-block" >
                        <span class="fa fa-fw fa-folder-open"></span> View Report</a>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="col-lg-3">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="text-center">
                    <h4>Amenities</h4>
                    </div>
                </div>
                <div class="card-body">
                    <center><span class="fa fa-fw fa-home" style="font-size:10em;"></span></center>
                    <div class="table-responsive  text-center">
                        <a href="<?php echo WEB_ROOT . 'admin-panel/?v=reports&page=amenities';?>" class="btn btn-primary btn-lg btn-block"><span class="fa fa-fw fa-folder-open"></span> View Reports</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-lg-3">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="text-center">
                    <h4>Events</h4>
                    </div>
                </div>
                <div class="card-body">
                    <center><span class="fa fa-fw fa-line-chart" style="font-size:10em;"></span></center>
                    <div class="table-responsive">
                    <a href="<?php echo 'javascript://;' 
                        //WEB_ROOT . 'admin-panel/?v=reports&page=events'; 
                        ?>" class="btn btn-primary btn-lg btn-block" id="editProfile"><span class="fa fa-fw fa-folder-open"></span> View Report</a>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="col-lg-3">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="text-center">
                    <h4>Users</h4>
                    </div>
                </div>
                <div class="card-body">
                    <center><span class="fa fa-fw fa-user" style="font-size:10em;"></span></center>
                    <div class="table-responsive">
                    <a href="<?php echo WEB_ROOT . 'admin-panel/?v=reports&page=caterers'; ?>" class="btn btn-primary btn-lg btn-block" id="editProfile"><span class="fa fa-fw fa-folder-open"></span> View Report</a>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="col-lg-3">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="text-center">
                    <h4>Reservations</h4>
                    </div>
                </div>
                <div class="card-body">
                    <center><span class="fa fa-fw fa-share-square-o" style="font-size:10em;"></span></center>
                    <div class="table-responsive">
                    <a href="<?php echo WEB_ROOT . 'admin-panel/?v=reports&page=reservations';
                     ?>" class="btn btn-primary btn-lg btn-block" id="editProfile"><span class="fa fa-fw fa-folder-open"></span> View Report</a>
                    </div>
                </div>
            </div>
        </div>

        

    </div>

    <?php endif; ?>
</div>
<!-- /.container-fluid-->
<?php if (isset($data['page'])) if (file_exists('pages/modals/'. $data['page'] .'_modal.php')) include('pages/modals/'. $data['page'] .'_modal.php');?>	
  
