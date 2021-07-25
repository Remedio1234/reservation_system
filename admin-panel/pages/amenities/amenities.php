
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT. 'admin-panel/?v=dashboard'?>">Dashboard</a></li>
    <li class="breadcrumb-item active">Amenities</li>
    </ol>
    <!-- Example DataTables Card-->
    <?php if(isset($_GET['id'])) : ?>
     <?php
        $query = $data['conn']->query("SELECT * FROM tbl_amenities WHERE id = '".$_GET['id']."' ");
        $photo = $query->fetch(PDO::FETCH_OBJ);
    ?>
    <?php if(!$query->rowCount() > 0) { ?>
            <script>window.location.href="?v=amenities"</script>
    <?php } ?>
    <div class="card mb-3">
        <div class="card-header">
            <div class="pull-left">
            <h4>Manage Photos - <?php echo $photo->name; ?> </h4>
            </div>
            <div class="pull-right">
                <a href="<?php echo WEB_ROOT . 'admin-panel/?v=amenities'; ?>" class="btn btn-success">Back</a>
                <a href="javascript:void(0);" id="uploadMultiplePhotos" class="btn btn-primary">Upload Multiple Photos</a>
            </div>
        </div>
         <div class="card-body">
                <?php 
                    $gallery = $data['conn']->query("SELECT * FROM tbl_gallery where id = '".$_GET['id']."' ORDER BY gallery_id DESC");
                    if ($gallery->rowCount() > 0) : 
                ?>
                <div class="row text-center text-lg-left">
                    <?php while ($photos = $gallery->fetch(PDO::FETCH_OBJ)) { ?>
                    <div class="col-lg-3 col-md-4 col-xs-6 gallery">
                        <a href="#" class="d-block mb-4 h-100">
                            <img class="img-fluid img-thumbnail img" src="<?php echo WEB_ROOT . 'admin-panel/uploads/gallery/' . $photos->photos; ?>" alt="">
                        </a>
                        <div class="overlay"></div>
                        <div class="button"><a href="#" class="btn-danger" id="delete_gallery" data-id="<?php echo $photos->gallery_id; ?>" ><span class="fa fa-fw fa-trash"></span> Delete</a></div>
                    </div>
                    <?php } ?>
                </div>
                <?php else : ?>
                <div class="alert alert-warning" role="alert">
                    <span class="fa fa-fw fa-image"></span> No images found..
                </div>
                <?php endif; ?>
         </div>
    </div>
    <?php else : ?>
    <div class="card mb-3">
        <div class="card-header">
            <div class="pull-left">
            <h4>List Of Amenities </h4>
            </div>
            <!-- <div class="pull-right">
            <button class="btn btn-primary" id="showModal">+Add New</button>
            </div> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Details</th>
                    <th>Capacity</th>
                    <th>Quantity</th>
                    <th>Price Day</th>
                    <th>Price Night</th>
                    <th>Status</th>
                    <th>Date Added</th>
                    <th style="width:300px;text-align:center;">Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $query = $data['conn']->query("SELECT a.*, c.name as category FROM tbl_amenities a 
                        JOIN tbl_categories c ON a.category_id = c.id ORDER BY a.id DESC");
                        while ($row = $query->fetch(PDO::FETCH_OBJ)) { 
                    ?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo ucfirst($row->name); ?></td>
                    <td><?php echo ucfirst($row->category); ?></td>
                    <td><?php echo ucfirst($row->details); ?></td>
                    <td><?php echo $row->capacity; ?></td>
                    <td><?php echo $row->quantity; ?></td>
                    <td><?php echo number_format($row->amount_per_hour,2); ?></td>
                    <td><?php echo number_format($row->amount_per_night,2); ?></td>
                    <td><span class="<?php echo ($row->status == 'av' ? 'text-success' : 'text-danger'); ?>"><?php echo ($row->status == 'av' ? 'Active' : 'In-active'); ?></span></td>
                    <td><?php echo date('Y-m-d',strtotime($row->created_at)); ?></td>
                    <td align="center">
                        <a href="javascript:void(0);" class="btn btn-sm btn-success" data-id="<?php echo $row->id; ?>" id="editModal"><i class="fa fa-pencil"></i> Edit </a>
                        <!-- <a href="<?php echo WEB_ROOT . 'admin-panel/?v=amenities&id='.$row->id; ?>" class="btn btn-sm btn-primary" data-id="<?php echo $row->id; ?>" ><i class="fa fa-upload fa-fw"></i> Upload Photos </a>     -->
                        <!-- <a href="javascript:void(0);" class="btn btn-danger btn-sm mt-1" data-id="<?php echo $row->id; ?>" id="deleteData"><i class="fa fa-trash"></i> Delete </a>    -->
                    </td>
                </tr>
                        <?php } ?>
            
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<!-- /.container-fluid-->
<?php if (isset($data['page'])) if (file_exists('pages/modals/'. $data['page'] .'_modal.php')) include('pages/modals/'. $data['page'] .'_modal.php');?>	
  
