<form id="FormAction" name="FormAction" method="post">
    <input type="hidden" name="action" id="action" value="category">
    <input type="hidden" value="<?php echo @$row['category_id']; ?>" name="category_id" id="category_id" >
    <div class="form-group">
        <label for="recipient-name" class="control-label">Category Name</label>
        <input type="text" value="<?php echo @$row['name']; ?>" class="form-control" id="name" name="name" required placeholder="Enter Category">
        <input type="hidden" value="<?php echo @$row['name']; ?>" class="form-control" id="name_1" name="name_1">
    </div>
    <div class="form-group">
        <label for="details" class="control-label">Details</label>
        <textarea value="<?php echo @$row['details']; ?>" class="form-control" id="details" name="details" placeholder="Enter Details"><?php echo @$row['details']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="message-text" class="control-label">Status</label>
       <select class="form-control" name="status" id="status" required>
           <option <?php echo (isset($row['status']) && $row['status'] == 'av' ? 'selected' : '' ); ?> value="av">Active</option>
           <option <?php echo (isset($row['status']) && $row['status'] == 'na' ? 'selected' : '' ); ?> value="na">In-active</option>
       </select>
    </div>
    <button type="submit" class="btn btn-primary pull-right" id="btnAction">Submit</button>
</form>