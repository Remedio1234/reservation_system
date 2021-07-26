<?php
    $tables = [
      'category' 		=> 'tbl_categories',
      'amenity' 			=> 'tbl_amenities',
      'caterer' 		=> 'tbl_caterers',
      'reservations' 	=> 'tbl_reservations',
      'user' 			=> 'tbl_users',
      'customers' 		=> 'tbl_customers'
    ];
    ?>
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo WEB_ROOT. 'admin-panel/?v=dashboard'?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-hand-o-right"></i>
                    </div>
                    <h4>
                        <div class="mr-5">
                            <?php echo $data['conn']->query("SELECT COUNT(*) AS category FROM " . $tables['category'] . " ")->fetch(PDO::FETCH_OBJ)->category; ?> 
                            Categories
                        </div>
                    </h4>
                </div>
                <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'): ?>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo WEB_ROOT . 'admin-panel/?v=category'; ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fa fa-angle-right"></i>
                </span>
                </a>
                <?php endif ?>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-home"></i>
                    </div>
                    <h4>
                        <div class="mr-5">
                            <?php echo $data['conn']->query("SELECT COUNT(*) AS amenity FROM " . $tables['amenity'] . " ")->fetch(PDO::FETCH_OBJ)->amenity; ?> 
                            Amenities
                        </div>
                    </h4>
                </div>
                <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'): ?>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo WEB_ROOT . 'admin-panel/?v=amenities'; ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fa fa-angle-right"></i>
                </span>
                </a>
                <?php endif ?>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-calendar-o"></i>
                    </div>
                    <h4>
                        <div class="mr-5">
                            <?php echo $data['conn']->query("SELECT COUNT(*) AS reservations FROM " . $tables['reservations'] . " ")->fetch(PDO::FETCH_OBJ)->reservations; ?> 
                            Reservations
                        </div>
                    </h4>
                </div>
                <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'): ?>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo WEB_ROOT . 'admin-panel/?v=reservations'; ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fa fa-angle-right"></i>
                </span>
                </a>
                <?php endif ?>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-vcard-o"></i>
                    </div>
                    <h4>
                        <div class="mr-5">
                            <?php echo $data['conn']->query("SELECT COUNT(*) AS customers FROM " . $tables['customers'] . " ")->fetch(PDO::FETCH_OBJ)->customers; ?> 
                            Customers
                        </div>
                    </h4>
                </div>
                <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin'): ?>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo WEB_ROOT . 'admin-panel/?v=customers'; ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                <i class="fa fa-angle-right"></i>
                </span>
                </a>
                <?php endif ?>
            </div>
        </div>
    </div>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <h5>10 Recent Reservations</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Reservation ID</th>
                            <th>Fullname</th>
							<th>Contact</th>
							<th>Eamil</th>
							<th>Total</th>
							<th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = $data['conn']->query("SELECT 
							rr.id, rr.reservation_id, cc.fullname, cc.contact, cc.email_address,rr.date_applied FROM tbl_reservations rr 
							INNER JOIN tbl_customers cc ON rr.customer_id = cc.id OR rr.guest_id = cc.guest_id LIMIT 10");
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                              ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->reservation_id; ?></td>
							<td><?php echo $row->fullname; ?></td>
							<td><?php echo $row->contact; ?></td>
							<td><?php echo $row->email_address; ?></td>
							<td>
								<strong>
									<?php echo @number_format($data['conn']->query("SELECT SUM(total_amount) AS total FROM tbl_details WHERE reservation_id = '".$row->id."'")->fetch(PDO::FETCH_OBJ)->total,2); ?> 
								</strong>
							</td>
							<td><?php echo date('M d, Y, d H:i:s', strtotime($row->date_applied)); ?></td>
                        </tr>
                        <?php 
                            } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid-->