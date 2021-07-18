<form id="FormAction" name="FormAction" method="post">
    <input type="hidden" name="action" id="action" value="caterers">
    <input type="hidden" value="<?php echo @$row['caterers_id']; ?>" name="caterers_id" id="caterers_id" >
    <div class="form-group">
        <label for="caterers-name" class="control-label">Caterer Name</label>
        <input type="text" value="<?php echo @$row['caterers_name']; ?>" class="form-control" id="caterers_name" name="caterers_name" required placeholder="Enter Caterer's name">
        <input type="hidden" value="<?php echo @$row['caterers_name']; ?>" class="form-control" id="caterers_name_1" name="caterers_name_1">
    </div>
    <div class="form-group">
        <label for="details" class="control-label">Details</label>
        <textarea value="<?php echo @$row['details']; ?>" class="form-control" id="details" name="details" placeholder="Enter Details"><?php echo @$row['details']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="address" class="control-label">Address</label>
        <textarea value="<?php echo @$row['address']; ?>" class="form-control" id="address" name="address" placeholder="Enter Address"><?php echo @$row['address']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="contact" class="control-label">Contact</label>
        <input type="text" value="<?php echo @$row['contact']; ?>" class="form-control" id="contact" name="contact" placeholder="Enter Contact">
    </div>
    <div class="form-group">
        <label for="pax-name" class="control-label">Pax</label>
        <input type="number" value="<?php echo @$row['pax']; ?>" class="form-control" id="pax" name="pax" required placeholder="0">
    </div>
    <div class="form-group">
        <label for="pax-name" class="control-label">Total Price</label>
        <input type="text" value="<?php echo @$row['total_price']; ?>" class="form-control" id="total_price" name="total_price" required placeholder="0.00">
    </div>
    <div class="form-group">
        <label for="message-text" class="control-label">Status</label>
       <select class="form-control" name="status" id="status" required>
           <option <?php echo (isset($row['status']) && $row['status'] == 'av' ? 'selected' : ''); ?> value="av">Active</option>
           <option <?php echo (isset($row['status']) && $row['status'] == 'na' ? 'selected' : ''); ?> value="na">In-active</option>
       </select>
    </div>
    <button type="submit" class="btn btn-primary pull-right" id="btnAction">Submit</button>
</form>