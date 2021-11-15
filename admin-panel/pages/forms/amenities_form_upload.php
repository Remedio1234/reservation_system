<form id="FormAction" name="FormActionGallery" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" id="action" value="venues_upload">
    <input type="hidden" value="<?php echo @$row['id']; ?>" name="amenities_id" id="amenities_id" >
    <div class="form-group">
        <label for="recipient-name" class="control-label">Images</label>
        <input type="file" multiple class="form-control" accept="image/*" name="images[]" id="images">
    </div>
    
    <button type="submit" class="btn btn-primary pull-right" id="btnAction">Upload</button>
</form>