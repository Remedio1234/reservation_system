<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT. 'admin-panel/?v=dashboard'?>">Dashboard</a></li>
    <li class="breadcrumb-item active">Customers</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
    <div class="card-header">
        <div class="pull-left">
        <h4>List Of Customers </h4>
        </div>
        <div class="pull-right">
        <button class="btn btn-primary" id="showModal">+Add New</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <!-- <th>Type</th> -->
                    <th style="width:8%;">Profile</th>
                    <th>Username</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th style="width:15%;text-align:center;">Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $data['conn']->query("SELECT * FROM tbl_customers WHERE guest_id IS NULL ORDER BY id DESC");
                    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                        ?>
                    <tr>
                        <td><?php echo $row->id; ?></td>
                        <!-- <td><?php echo (!$row->guest_id) ? 'Customer' : 'Guest'; ?></td> -->
                        <td>
                            <?php if(!$row->guest_id) :?>
                                <img style="width:50%;" src="<?php echo WEB_ROOT . 'profile/' . $row->profile; ?>"/>
                                <?php else: ?>
                                    NA
                            <?php endif?>
                        </td>
                        <td><?php echo (!$row->guest_id) ? $row->username : 'NA'; ?></td>
                        <td><?php echo (($row->fullname) ? $row->fullname : 'NA'); ?></td>
                        <td><?php echo $row->email_address; ?></td>
                        <td><?php echo (($row->contact) ? $row->contact : 'NA'); ?></td>
                        <td><?php echo (($row->address) ? $row->address : 'NA'); ?></td>
                        <td>
                            <?php if($row->status == 'active') { ?>
                            <span class="text-success">Active</span>
                            <?php } else {?>
                            <span class="text-danger">In-Active</span>
                            <?php } ?>
                        </td>
                        <td align="center">
                            <?php if(!$row->guest_id): ?>
                                <a href="javascript:void(0);" class="btn btn-sm btn-success" data-id="<?php echo $row->id; ?>" id="editModal"><i class="fa fa-pencil"></i> Edit </a>
                            <!-- <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-1" data-id="<?php echo $row->id; ?>" id="deleteData"><i class="fa fa-trash"></i> Delete </a>    -->
                            <?php else: ?>
                                NA
                            <?php endif ?>    
                        </td>
                    </tr>
                            <?php 
                        } ?>
            
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
<!NA /.container-fluidNA>
<?php if (isset($data['page'])) if (file_exists('pages/modals/'. $data['page'] .'_modal.php')) include('pages/modals/'. $data['page'] .'_modal.php');?>	
  
