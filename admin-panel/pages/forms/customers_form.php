<form id="FormAction" name="FormAction" method="post">
    <input type="hidden" name="action" id="action" value="customers">
    <input type="hidden" value="<?php echo @$row['customer_id']; ?>" name="customer_id" id="customer_id" >
    <div class="form-group">
        <label for="fullname" class="control-label">Fullname</label>
        <input type="text" value="<?php echo @$row['fullname']; ?>" class="form-control" id="fullname" name="fullname" required placeholder="Enter Fullname">
    </div>
    <div class="form-group">
        <label for="recipient-name" class="control-label">Username</label>
        <input type="text" value="<?php echo @$row['username']; ?>" class="form-control" id="username" name="username" required placeholder="Enter Username">
        <input type="hidden" value="<?php echo @$row['username']; ?>" class="form-control" id="username_1" name="username_1">
    </div>
    <div class="form-group">
        <label for="password" class="control-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" <?php echo (@$row['customer_id']) ? '' : 'required'; ?> placeholder="Enter Password">
    </div>
    <div class="form-label-group">
        <label for="email_address">Email address</label>
        <input type="email" id="email_address" value="<?php echo @$row['email_address']; ?>" name="email_address" class="form-control" placeholder="Email address" required >
    </div>
    <div class="form-group">
        <label for="contact" class="control-label">Contact</label>
        <input type="number" value="<?php echo @$row['contact']; ?>" class="form-control" id="contact" name="contact"  placeholder="Enter Contact">
    </div>
    <div class="form-group">
        <label for="details" class="control-label">Address</label>
        <textarea value="<?php echo @$row['address']; ?>" class="form-control" id="address" name="address" placeholder="Enter Address"><?php echo @$row['address']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="message-text" class="control-label">Status</label>
       <select class="form-control" name="status" id="status" required>
           <option <?php echo (isset($row['status']) && $row['status'] == 'av' ? 'selected' : ''); ?> value="av">Active</option>
           <option <?php echo (isset($row['status']) && $row['status'] == 'pen' ? 'selected' : ''); ?> value="pen">Pending</option>
           <option <?php echo (isset($row['status']) && $row['status'] == 'na' ? 'selected' : ''); ?> value="na">In-active</option>
       </select>
    </div>
    <button type="submit" class="btn btn-primary pull-right" id="btnAction">Submit</button>
</form>