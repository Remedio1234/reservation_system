<?php
$tables = [
  'category' => 'tbl_categories',
  'venues' => 'tbl_amenities',
  'caterer' => 'tbl_caterers',
  'reservations' => 'tbl_reservations',
  'user' => 'tbl_users',
  'customers' => 'tbl_customers'
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
                Category
                </div>
              </h4>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo WEB_ROOT . 'admin-panel/?v=category'; ?>">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
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
                <?php echo $data['conn']->query("SELECT COUNT(*) AS venues FROM " . $tables['venues'] . " ")->fetch(PDO::FETCH_OBJ)->venues; ?> 
                Venues
                </div>
              </h4>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo WEB_ROOT . 'admin-panel/?v=venues'; ?>">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
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
            <a class="card-footer text-white clearfix small z-1" href="<?php echo WEB_ROOT . 'admin-panel/?v=reservations'; ?>">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
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
            <a class="card-footer text-white clearfix small z-1" href="<?php echo WEB_ROOT . 'admin-panel/?v=customers'; ?>">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
            <h5>Recent Reservations</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Venues</th>
                    <th>Category</th>
                    <th>Caterers</th>
                    <th>DateFrom</th>
                    <th>DateTo</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
              </thead>
            <tbody>
              
            <?php
            $query = $data['conn']->query("SELECT 
                cus.fullname,
                res.reservation_id, 
                res.total_hours,
                res.sub_total,
                res.total,
                res.date_from,
                res.date_to,
                res.date_applied,
                res.status,
                ev.name,
                ven.name,
                cat.caterers_name 
                FROM tbl_reservations res 
                INNER JOIN tbl_customers cus ON cus.customer_id = res.customer_id
                INNER JOIN tbl_amenities ven ON ven.amenities_id = res.amenities_id 
                INNER JOIN tbl_categories ev ON ev.category_id = res.events_id 
                LEFT JOIN tbl_caterers cat ON cat.caterers_id = res.caterers_id LIMIT 10");
            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
              ?>
                <tr>
                    <td><?php echo $row->reservation_id; ?></td>
                    <td><?php echo $row->fullname; ?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo ($row->caterers_name) ? $row->caterers_name : 'NA'; ?></td>
                    <td><?php echo $row->date_from; ?></td>
                    <td><?php echo $row->date_to; ?></td>
                    <td><?php echo number_format($row->total, 2); ?></td>
                    <td><?php echo ucfirst($row->status); ?></td>

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