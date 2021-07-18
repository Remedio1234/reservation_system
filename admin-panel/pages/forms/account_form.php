<form id="FormActionUser" name="FormActionUser" method="post">
    <input type="hidden" name="action" id="action" value="account">
    <input type="hidden" value="<?php echo @$row['user_id']; ?>" name="user_id" id="user_id" >
    <div class="form-group">
        <label for="full-name" class="control-label">Fullname</label>
        <input type="text" value="<?php echo @$row['fullname']; ?>" class="form-control" id="fullname" name="fullname" required placeholder="Enter Fullname">
    </div>
    <div class="form-group">
        <label for="user-name" class="control-label">Username</label>
        <input type="text" value="<?php echo @$row['username']; ?>" class="form-control" id="username" name="username" required placeholder="Enter Username">
        <input type="hidden" value="<?php echo @$row['username']; ?>" class="form-control" id="username_1" name="username_1">
    </div>
    <div class="form-group">
        <label for="password-name" class="control-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="password-name" class="control-label">Confirm Password</label>
        <input type="password"  class="form-control" id="confirm_password" name="confirm_password">
    </div>
    <div class="form-group">
        <label for="details" class="control-label">Email Address</label>
        <input type="text" value="<?php echo @$row['email']; ?>" class="form-control" id="email" name="email" required placeholder="Enter Event">
    </div>
    <button type="submit" class="btn btn-primary pull-right" id="btnAction">Update</button>
</form>