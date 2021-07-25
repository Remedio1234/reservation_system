<div class="row">
			<div class="col-12">
				<div class="card ">
					<div class="card-body">
						<div class="float-left">
                            <h3 class="card-title m-b-0 mt-1">Customers Report</h3>
                        </div>
                        <div class="float-right">
                            <a href="<?php echo WEB_ROOT . 'admin-panel/?v=reports'; ?>" class="btn btn-secondary">Back to report</a>
                        </div>
					</div>
					<hr class="m-t-0">
					<div class="card-body" style="padding-top:0px;">
                        <!-- row -->
                        <form method="post" name="formCustomer" id="formCustomer">
                        <div class="row">
                            
                                <div class="form-group col-md-2">
                                    <select class="form-control" name="status" id="status">
                                        <?php
                                            $options = ['' => 'All Status','active' =>  'Active', 'inactive'=>'InActive'];
                                        ?>
                                    <?php foreach ($options as $key => $status) { ?>
                                        <option <?php echo (@$_POST['status'] == $key ? 'selected' : ''); ?> value="<?php echo $key; ?>"><?php echo $status; ?></option>
                                    <?php  } ?>                                                       
                                    </select>
                                </div>
                            
                          
                                <div class="form-group col-md-1">
                                    <button name="btn_search" class="btn btn-secondary waves-effect waves-light" type="submit"><span class="btn-label"><i class="fa fa-search"></i></span> Search</button>
                                </div>
                           
                            <div class="form-group col-md-9">
                               <button type="button" class="btn btn-secondary dropdown-toggle float-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Export Data
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item" href="javascript://" onclick="exportToCustomer('csv');">CSV File</a>
                                    <a class="dropdown-item" href="javascript://" onclick="exportToCustomer('xls');">Excel File</a>
                                    <!-- <a class="dropdown-item" href="javascript://" onclick="exportToCustomer('xlsx');">XLSX</a> -->
                                    <a class="dropdown-item" href="javascript://" onclick="exportToCustomer('txt');">Plain Text</a>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                         </form>

                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Customers List</h4>
                                        <div class="scroll-table" style="padding-top:0px;overflow-y: auto;height: 800px;">
                                            <table class="table table-bordered" id="customer" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Username</th>
                                                    <th>Fullname</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Address</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if(isset($_POST['btn_search']) && !empty($_POST['status'])) :
                                                    $query = $data['conn']->query("SELECT * FROM tbl_customers WHERE status = '".$_POST['status']."' ORDER BY customer_id ASC");
                                                    else :
                                                    $query = $data['conn']->query("SELECT * FROM tbl_customers ORDER BY id ASC");
                                                    endif;
                                                    if($query->rowCount() > 0) : 
                                                    $i = 0; while ($row = $query->fetch(PDO::FETCH_OBJ)) { $i++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row->id; ?></td>
                                                            <td><?php echo $row->username; ?></td>
                                                            <td><?php echo (($row->fullname) ? $row->fullname : 'NA'); ?></td>
                                                            <td><?php echo $row->email_address; ?></td>
                                                            <td><?php echo (($row->contact) ? $row->contact : 'NA'); ?></td>
                                                            <td><?php echo (($row->address) ? $row->address : 'NA'); ?></td>
                                                            <td>
                                                                <?php if ($row->status == 'pen') { ?>
                                                                <span class="text-warning">Pending</span>
                                                                <?php 
                                                            } elseif ($row->status == 'av') { ?>
                                                                <span class="text-success">Active</span>
                                                                <?php 
                                                            } else { ?>
                                                                <span class="text-danger">In-Active</span>
                                                                <?php 
                                                            } ?>
                                                            </td>
                                                            
                                                        </tr>
                                                            <?php 
                                                        } ?>
                                                        <?php else : ?>
                                                        <tr>
                                                            <td colspan="8">No records found.!</td>
                                                        </tr>
                                                    <?php endif;?>
                                            
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>                                                          
                        </div>
                        <!-- end row -->
					</div>
				</div>
			</div>
		</div>