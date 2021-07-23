<form id="FormAction" name="FormAction" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" id="action" value="amenities">
    <input type="hidden" value="<?php echo @$row['amenities_id']; ?>" name="amenities_id" id="amenities_id" >
    <!-- <div class="form-group">
        <label for="recipient-name" class="control-label">Image</label>
        <input type="file"  class="form-control" accept="image/*" name="image" id="image">
    </div> -->

    <div class="form-group">
        <label for="message-text" class="control-label">Category</label>
       <select class="form-control" name="category_id" id="category_id" required>
            <option>Select Category..</option>
           <?php 
            while ($val = $query->fetch(PDO::FETCH_OBJ)) { ?>
            <option <?php echo ((@$row['id'] == $val->id) ? 'selected' : ''); ?> value="<?php echo $val->id; ?>"><?php echo $val->name?></option>
            <?php } ?>
       </select>
    </div>

    <div class="form-group">
        <label for="recipient-name" class="control-label">Name</label>
        <input type="text" value="<?php echo @$row['name']; ?>" class="form-control" id="name" name="name" required placeholder="Enter Name">
        <input type="hidden" value="<?php echo @$row['name']; ?>" class="form-control" id="name_1" name="name_1">
    </div>

    <div class="form-group">
        <label for="details" class="control-label">Details</label>
        <textarea value="<?php echo @$row['details']; ?>" class="form-control" id="details" name="details"  placeholder="Enter Details"><?php echo @$row['details']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="details" class="control-label">Capacity</label>
        <input type="number" value="<?php echo @$row['capacity']; ?>" class="form-control" id="capacity" name="capacity" required placeholder="0">
    </div>
    <div class="form-group">
        <label for="details" class="control-label">Quantity</label>
        <input type="number" value="<?php echo @$row['quantity']; ?>" class="form-control" id="quantity" name="quantity" required placeholder="0">
    </div>

    <div class="form-group">
        <label for="details" class="control-label">Price (per day)</label>
        <input type="number" value="<?php echo @$row['amount_per_hour']; ?>" class="form-control" id="amount_per_hour" name="amount_per_hour" required placeholder="0.00">
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