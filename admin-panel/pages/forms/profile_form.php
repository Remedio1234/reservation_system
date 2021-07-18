<form id="FormActionProfile" name="FormAction" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" id="action" value="profile">
    <input type="hidden" value="<?php echo @$row['profile_id']; ?>" name="profile_id" id="profile_id" >
    <div class="form-group">
        <label for="recipient-name" class="control-label">Site Logo</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>

    <div class="form-group">
        <label for="recipient-name" class="control-label">Site Title</label>
        <input type="text" value="<?php echo @$row['site_title']; ?>" class="form-control" id="site_title" name="site_title" required placeholder="Enter Site Title">
    </div>
    
    <div class="form-group">
        <label for="recipient-name" class="control-label">Company Name</label>
        <input type="text" value="<?php echo @$row['company_name']; ?>" class="form-control" id="company_name" name="company_name"  placeholder="Enter Company Name">
    </div>

    <div class="form-group">
        <label for="recipient-name" class="control-label">Contact</label>
        <input type="text" value="<?php echo @$row['contact']; ?>" class="form-control" id="contact" name="contact"  placeholder="Enter Contact">
    </div>

    <div class="form-group">
        <label for="recipient-name" class="control-label">Email Address</label>
        <input type="text" value="<?php echo @$row['email_address']; ?>" class="form-control" id="email_address" name="email_address"  placeholder="Enter Email Address">
    </div>

    <div class="form-group">
        <label for="recipient-name" class="control-label">Address</label>
        <textarea class="form-control" value="<?php echo @$row['address']; ?>" id="address" name="address"  placeholder="Enter Address"><?php echo @$row['address']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary pull-right" id="btnAction">Submit</button>
</form>