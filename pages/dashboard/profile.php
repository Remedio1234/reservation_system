<style>
/* .container{width: 100%;} */
.user-box {
    width: 200px;
    border-radius: 0 0 3px 3px;
    /* padding: 10px; */
    position: relative;
}
.user-box .name {
    word-break: break-all;
    padding: 10px 10px 10px 10px;
    background: #EEEEEE;
    text-align: center;
    font-size: 20px;
}
.user-box form{display: inline;}
.user-box .name h4{margin: 0;}
.user-box img#imagePreview{width: 100%;}

.editLink {
    position:absolute;
    top:28px;
    right:10px;
    opacity:0;
    transition: all 0.3s ease-in-out 0s;
    -mox-transition: all 0.3s ease-in-out 0s;
    -webkit-transition: all 0.3s ease-in-out 0s;
    background:rgba(255,255,255,0.2);
}
.img-relative:hover .editLink{opacity:1;}
.overlay{
    position: absolute;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 2;
    background: rgba(255,255,255,0.7);
}
.overlay-content {
    position: absolute;
    transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    top: 50%;
    left: 0;
    right: 0;
    text-align: center;
    color: #555;
}
.uploadProcess img{
    max-width: 207px;
    border: none;
    box-shadow: none;
    -webkit-border-radius: 0;
    display: inline;
}
</style>
    <?php
    //Get current user ID from session
    $userId = @$_SESSION['customer']['customer_id'];

    //Get user data from database
    $row = $data['conn']->query("SELECT * FROM tbl_customers WHERE id = $userId")->fetch(PDO::FETCH_ASSOC);
                
    //User profile picture
    $userPicture    = $row['profile'];
    $userPictureURL = 'profile/' . $userPicture;
    ?>  
    <center>
    <div class="container">
    <div class="user-box">
        <div class="img-relative">
            <!-- Loading image -->
            <div class="overlay uploadProcess" style="display: none;">
                <div class="overlay-content"><img src="profile/loading.gif"/></div>
            </div>
            <!-- Hidden upload form -->
            <form method="post" action="<?php echo WEB_ROOT . 'execute/profile.php'; ?>" enctype="multipart/form-data" id="picUploadForm" target="uploadTarget">
                <input type="file" name="picture" id="fileInput"  style="display:none"/>
            </form>
            <iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
            <!-- Image update link -->
            <a class="editLink" href="javascript:void(0);"><img src="<?php echo WEB_ROOT; ?>profile/edit.png"/></a>
            <!-- Profile image -->
            <img src="<?php echo $userPictureURL; ?>" id="imagePreview">
        </div>
        <div class="name">
            <h4>Hi, <?php echo ucfirst($row['username']); ?>!</h3>
        </div>
        <small class="text-danger">*** move cursor over the image, edit icon will appear.</small>
    </div>
</div>
</center>
