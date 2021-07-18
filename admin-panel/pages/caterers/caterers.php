<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT. 'admin-panel/?v=dashboard'?>">Dashboard</a></li>
    <li class="breadcrumb-item active">Caterers</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
    <div class="card-header">
        <div class="pull-left">
        <h4>List Of Caterers </h4>
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
                <th>Caterer Name</th>
                <th>Details</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Pax</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Date</th>
                <th style="width:150;text-align:center;">Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $query = $data['conn']->query("SELECT * FROM tbl_caterers ORDER BY caterers_id DESC");
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) { 
                ?>
            <tr>
                <td><?php echo $row['caterers_id']; ?></td>
                <td><?php echo ucfirst($row['caterers_name']); ?></td>
                <td><?php echo ucfirst($row['details']); ?></td>
                <td><?php echo ucfirst($row['address']); ?></td>
                <td><?php echo ucfirst($row['contact']); ?></td>
                 <td><?php echo $row['pax']; ?></td>
                <td><?php echo number_format($row['total_price'],2); ?></td>
                <td><span class="<?php echo ($row['status'] == 'av' ? 'text-success' : 'text-danger'); ?>"><?php echo ($row['status'] == 'av' ? 'Active' : 'In-active'); ?></span></td>
                <td><?php echo date('Y-m-d',strtotime($row['created_at'])); ?></td>
                <td align="center">
                    <a href="javascript:void(0);" class="btn btn-success btn-sm" data-id="<?php echo $row['caterers_id']; ?>" id="editModal"><i class="fa fa-pencil"></i> Edit </a>
                    <a href="javascript:void(0);" class="btn btn-danger btn-sm" data-id="<?php echo $row['caterers_id']; ?>" id="deleteData"><i class="fa fa-trash"></i> Delete </a>
                </td>
            </tr>
                    <?php } ?>
        
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
<!-- /.container-fluid-->
<?php if (isset($data['page'])) if (file_exists('pages/modals/'. $data['page'] .'_modal.php')) include('pages/modals/'. $data['page'] .'_modal.php');?>	
  
