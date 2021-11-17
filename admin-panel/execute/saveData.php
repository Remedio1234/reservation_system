<?php
    require_once('../../library/config.php');
    extract($_POST);
    $tables = [
        'categories'        => 'tbl_categories',
        'amenities'         => 'tbl_amenities',
        'caterer'           => 'tbl_caterers',
        'gallery'           => 'tbl_gallery',
        'profile'           =>'tbl_profile',
        'user'              => 'tbl_users',
        'customers'         => 'tbl_customers',
        'reservations'      => 'tbl_reservations',
        'details'           => 'tbl_details'
    ];
    switch ($action) {

        /* ======== update reservation status */
        case 'reservations':
            $query = $dbConn->query("UPDATE " . $tables['reservations'] . " SET status = '" . $status . "' WHERE id = " . $id . " ");
            $dbConn->query("UPDATE " . $tables['details'] . " SET status = '" . $status . "' WHERE reservation_id = " . $id . " ");
            $data = $dbConn->query("SELECT * FROM " . $tables['reservations'] . " WHERE id = " . $id . "")->fetch(PDO::FETCH_ASSOC);
            if($data['customer_id'] && $status != 'pending'){
                $message = "Your reservation {$data['reservation_id']} has been successfully {$status}.";
                $dbConn->query("INSERT INTO tbl_notifications(customer_id, message)VALUES('" . $data['customer_id'] . "','" . $message . "')");
            }

            require_once("../../mail/mailer.php");
            if($data['customer_id']){
                $user = $dbConn->query("SELECT * FROM tbl_customers where id = '".$data['customer_id']."' ")->fetch(PDO::FETCH_ASSOC);
            } else {
                $user = $dbConn->query("SELECT * FROM tbl_customers where guest_id = '".$data['guest_id']."' ")->fetch(PDO::FETCH_ASSOC);
            }
            $customer_name  = $user['fullname'];
            $customer_email = $user['email_address']; 
            $subject        = "Your reservation {$data['reservation_id']} has been successfully {$status}."; 
            $mymessage      = $status == "cancelled" ? "We're sorry that this reservation didn't work out for you. <br> But we hope we'll hear from you again." : ""; 
            $final_message  = $subject . "<br>".$mymessage;
            if ($query) :
                $response = [
                'result'    => ($status != 'pending' ? sendMail($customer_name, $customer_email, $subject , $final_message) : "N/A"),   
                'response'  => 'success',
                'message'   => 'Reservation successfully submitted.'
            ];
            endif;
        break;
        /* ============= CATEGORIES MODULE =========== */
        case 'category':
            if(empty($id)) :
                $check_exist = $dbConn->query("SELECT * FROM ".$tables['categories']." WHERE name = '".$name."' ");
                if($check_exist->rowCount() > 0) :
                    $response = [
                        'response' => 'exist',
                        'message'  => 'Category already exist.'
                    ];
                else :
                    $query = $dbConn->query("INSERT INTO ".$tables['categories']." (name,details, status)VALUES('".$name."','".$details."','".$status."')");
                    if($query) :
                        $response = [
                            'response' => 'success',
                            'message'  => 'Category successfully saved.'
                        ];
                    endif;
                endif;
                
            else :
                if($name != $name_1) :
                    $check_exist = $dbConn->query("SELECT * FROM ".$tables['categories']." WHERE name = '".$name."' ");
                    if($check_exist->rowCount() > 0) :
                        $response = [
                            'response' => 'exist',
                            'message'  => 'Category already exist.'
                        ];
                    else :
                        $query = $dbConn->query("UPDATE ".$tables['categories']." SET name = '".$name. "',details = '" . $details . "',status = '".$status."' WHERE id = ".$id." ");
                        if($query) :
                            $response = [
                                'response' => 'success',
                                'message'  => 'Category successfully updated.'
                            ];
                        endif;
                    endif;
                else :
                    $query = $dbConn->query("UPDATE ".$tables['categories']." SET name = '".$name. "',details = '" . $details . "',status = '".$status."' WHERE id = ".$id." ");
                    if($query) :
                        $response = [
                            'response' => 'success',
                            'message'  => 'Category successfully updated.'
                        ];
                    endif;
                endif;
            endif;
        break;
        /* ============= END CATEGORIES MODULE =========== */

        /* ============= CUSTOMERS MODULE =========== */
    case 'customers':
        if (empty($id)) :
            $check_exist = $dbConn->query("SELECT * FROM " . $tables['customers'] . " WHERE username = '" . $username . "' ");
            if ($check_exist->rowCount() > 0) :
                $response = [
                    'response' => 'exist',
                    'message' => 'Username already exist.'
                ];
            else :
                $query = $dbConn->query("INSERT INTO " . $tables['customers'] . " (fullname,username,password,email_address,contact,address,profile,status)VALUES('" . $fullname . "','" . $username . "','" . md5($password) . "','" . $email_address . "','" . $contact . "','" . $address . "','default.jpg','" . $status . "')");
                if ($query) :
                    $response = [
                        'response' => 'success',
                        'message' => 'Customer successfully saved.'
                    ];
            endif;
        endif;

        else :
            if ($username != $username_1) :
                $check_exist = $dbConn->query("SELECT * FROM " . $tables['customers'] . " WHERE username = '" . $username . "' ");
                if ($check_exist->rowCount() > 0) :
                    $response = [
                    'response' => 'exist',
                    'message' => 'Customer already exist.'
                ];
                else :
                    if(empty($password)){
                        $query = $dbConn->query("UPDATE " . $tables['customers'] . " SET fullname = '" . $fullname . "',username = '" . $username . "',email_address = '" . $email_address . "',contact = '" . $contact . "',address = '" . $address . "',status = '" . $status . "' WHERE id = " . $id . " ");
                    } else {
                        $query = $dbConn->query("UPDATE " . $tables['customers'] . " SET fullname = '" . $fullname . "',username = '" . $username . "',password='".md5($password)."',email_address = '" . $email_address . "',contact = '" . $contact . "',address = '" . $address . "',status = '" . $status . "' WHERE id = " . $id . " ");    
                    }
                    if ($query) :
                            $response = [
                            'response' => 'success',
                            'message' => 'Customer successfully updated.'
                        ];
                    endif;
                endif;
            else :
                if (empty($password)) {
                    $query = $dbConn->query("UPDATE " . $tables['customers'] . " SET fullname = '" . $fullname . "',username = '" . $username . "',email_address = '" . $email_address . "',contact = '" . $contact . "',address = '" . $address . "',status = '" . $status . "' WHERE id = " . $id . " ");
                } else {
                    $query = $dbConn->query("UPDATE " . $tables['customers'] . " SET fullname = '" . $fullname . "',username = '" . $username . "',password='" . md5($password) . "',email_address = '" . $email_address . "',contact = '" . $contact . "',address = '" . $address . "',status = '" . $status . "' WHERE id = " . $id . " ");
                }
                if ($query) :
                    $response = [
                    'response' => 'success',
                    'message' => 'Customer successfully updated.'
                ];
                endif;
            endif;
        endif;
        break;
        /* ============= END CUSTOMERS MODULE =========== */

        /* ============= VENUES GALLERY MODULE =========== */
        case 'venues_upload':
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        $path = '../uploads/gallery/'; // upload directory
        $images_arr = array();
        foreach ($_FILES['images']['name'] as $key => $val) {
            $image_name = $_FILES['images']['name'][$key];
            $tmp_name = $_FILES['images']['tmp_name'][$key];
            $size = $_FILES['images']['size'][$key];
            $type = $_FILES['images']['type'][$key];
            $error = $_FILES['images']['error'][$key];
        
            // File upload path
            $fileName = time() . basename($_FILES['images']['name'][$key]);
            $targetFilePath = $path . $fileName;
        
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $valid_extensions)) {    
            // Store images on the server
                if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFilePath)) {
                    $images_arr[] = $targetFilePath;
                    $query = $dbConn->query("INSERT INTO " . $tables['gallery'] . " (amenities_id,photos)VALUES('" . $amenities_id . "','" . $fileName . "')");
                    if ($query) :
                        $response = [
                        'response' => 'success',
                        'message' => 'Photos successfully uploaded.'
                    ];
                    endif;
                }
            }
        }
        break;
         /* ============= END VENUES GALLERY MODULE =========== */

         /* ============= SETTINGS COMPANY PROFILE MODULE =========== */
        case 'profile':
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $path = '../uploads/company/'; // upload directory

            $img = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];

            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            $final_image = time() . $img;

            $check_exist = $dbConn->query("SELECT * FROM " . $tables['profile'] . " ");
            if ($check_exist->rowCount() > 0) :
                $old_file_photo = $dbConn->query("SELECT site_logo FROM " . $tables['profile'] . " WHERE profile_id = '" . $profile_id . "' ")->fetch(PDO::FETCH_OBJ)->site_logo;
                if ($_FILES['image']['name']) {
                    if (in_array($ext, $valid_extensions)) {
                        $path = $path . strtolower($final_image);
                        @unlink('../uploads/company/' . $old_file_photo); // delete file
                        if (move_uploaded_file($tmp, $path));
                    } else {
                        $response = [
                            'response' => 'invalid',
                            'message' => 'Invalid file'
                        ];
                        echo json_encode($response);
                        exit;
                    }
                    $site_logo = $final_image;
                } else {
                    $site_logo = $old_file_photo;
                }
                $query = $dbConn->query("UPDATE " . $tables['profile'] . " SET site_logo = '". $site_logo."', site_title = '" . $site_title . "',company_name = '" . $company_name . "',contact = '" . $contact . "',email_address = '" . $email_address . "',address = '" . $address . "' WHERE profile_id = " . $profile_id . " ");
                if ($query) :
                    $response = [
                    'response' => 'success',
                    'message' => 'Profile successfully updated.',
                    'row' => ''
                ];
                endif;
            else :
                if ($_FILES['image']['name']) {
                    if (in_array($ext, $valid_extensions)) {
                        $path = $path . strtolower($final_image);
                        if (move_uploaded_file($tmp, $path));
                    } else {
                        $response = [
                            'response' => 'invalid',
                            'message' => 'Invalid file'
                        ];
                        echo json_encode($response);
                        exit;
                    }
                    $site_logo = $final_image;
                } else {
                    $site_logo = 'default.jpg';
                }
                $query = $dbConn->query("INSERT INTO " . $tables['profile'] . " (site_logo,site_title,company_name,contact,email_address,address)VALUES('". $site_logo ."','" . $site_title . "','" . $company_name . "','" . $contact . "','" . $email_address . "','" . $address . "')");
                if ($query) :
                    $response = [
                    'response' => 'success',
                    'message' => 'Profile successfully saved.',
                    'row' => $dbConn->query("SELECT * FROM " . $tables['profile'] . " ")->fetch(PDO::FETCH_ASSOC)
                ];
                endif;
            endif;
        break;

        /* ============= END SETTINGS COMPANY PROFILE MODULE =========== */
        
        /* ============= SETTINGS USER ACCOUNT MODULE ==================*/
        case 'account' :
            include_once('../../api/user.api.php');
            $salt     = Users::generate(); // Generates a salt from the function above
            $combo    = $salt . $password; // Appending user password to the salt 
            $password = hash('sha512', $combo); // Using SHA512 to hash the salt+password combo string

            if ($username != $username_1) :
                    $check_exist = $dbConn->query("SELECT * FROM " . $tables['user'] . " WHERE username = '" . $username . "' ");
                        if ($check_exist->rowCount() > 0) :
                            $response = [
                                'response' => 'exist',
                                'message' => 'Account already exist.'
                            ];
                        else :
                            if ($_POST['password'] != '') {
                                $query = $dbConn->query("UPDATE " . $tables['user'] . " SET username = '" . $username . "', fullname = '" . $fullname . "',email='" . $email . "', password = '" . $password . "',salt='" . $salt . "' WHERE user_id = " . $_SESSION['user']['user_id'] . " ");
                            } else {
                                $query = $dbConn->query("UPDATE " . $tables['user'] . " SET username = '" . $username . "', fullname = '" . $fullname . "',email='" . $email . "' WHERE user_id = " . $_SESSION['user']['user_id'] . " ");
                            }
                            if ($query) :
                                $_SESSION['user']['username'] = $username;
                                $response = [
                                    'response' => 'success',
                                    'message' => 'Account successfully updated.'
                                ];
                            endif;
                        endif;
            else :
                if($_POST['password'] != ''){
                    $query = $dbConn->query("UPDATE " . $tables['user'] . " SET username = '" . $username . "', fullname = '" . $fullname . "',email='" . $email . "', password = '" . $password . "',salt='" . $salt . "' WHERE user_id = " . $_SESSION['user']['user_id'] . " ");
                } else {
                    $query = $dbConn->query("UPDATE " . $tables['user'] . " SET username = '" . $username . "', fullname = '" . $fullname . "',email='" . $email . "' WHERE user_id = " . $_SESSION['user']['user_id'] . " ");
                }
                if ($query) :
                    $_SESSION['user']['username'] = $username;
                    $response = [
                        'response' => 'success',
                        'message' => 'Account successfully updated.'
                    ];
                endif;
            endif;
            
        break;
        /* ============= END SETTINGS USER ACCOUNT MODULE =================*/

        /* ============= AMENITIES MODULE =========== */
        case 'amenities':
            // $valid_extensions = array('jpeg', 'jpg', 'png','gif'); // valid extensions
            // $path = '../uploads/'; // upload directory

            // $img = $_FILES['image']['name'];
            // $tmp = $_FILES['image']['tmp_name'];

            // $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            // $final_image = time(). $img;

            if(empty($amenities_id)) :
                $check_exist = $dbConn->query("SELECT * FROM ".$tables['amenities']." WHERE name = '".$name."' ");
                if($check_exist->rowCount() > 0) :
                    $response = [
                        'response' => 'exist',
                        'message'  => 'Amenity already exist.'
                    ];
                else :
                    // if ($_FILES['image']['name']) {
                    //     if (in_array($ext, $valid_extensions)) {
                    //         $path = $path . strtolower($final_image);
                    //             if (move_uploaded_file($tmp, $path)) ;
                    //     } else {
                    //         $response = [
                    //             'response' => 'invalid',
                    //             'message'   => 'Invalid file'
                    //         ];
                    //         echo json_encode($response); exit;
                    //     }
                    //     $photo = $final_image;
                    // } else {
                        $photo = 'default.jpg';
                    // }

                    $query = $dbConn->query("INSERT INTO ".$tables['amenities']. " (category_id, 
                    name,
                    details,
                    amount_per_hour,
                    amount_per_night,
                    photo,
                    capacity,
                    quantity,
                    status)VALUES('". $category_id ."','". $name ."',
                    '".$details."','". $amount_per_hour ."','". $amount_per_night ."','". $photo . "','" . $capacity . "','" . $quantity . "','".$status."')");
                    if($query) :
                        $response = [
                            'response' => 'success',
                            'message'  => 'Amenity successfully saved.'
                        ];
                    endif;
                endif;
                
            else :
                if($name != $name_1) :
                    $check_exist = $dbConn->query("SELECT * FROM " . $tables['amenities'] . " WHERE name = '" . $name . "' ");
                    if($check_exist->rowCount() > 0) :
                        $response = [
                            'response' => 'exist',
                            'message'  => 'Amenity already exist.'
                        ];
                    else :
                        $old_file_photo = $dbConn->query("SELECT photo FROM " . $tables['amenities'] . " WHERE id = '" . $amenities_id . "' ")->fetch(PDO::FETCH_OBJ)->photo;
                        // if ($_FILES['image']['name']) {
                        //     if (in_array($ext, $valid_extensions)) {
                        //         $path = $path . strtolower($final_image);
                        //         @unlink('../uploads/'. $old_file_photo); // delete file
                        //         if (move_uploaded_file($tmp, $path));
                        //     } else {
                        //         $response = [
                        //             'response' => 'invalid',
                        //             'message' => 'Invalid file'
                        //         ];
                        //         echo json_encode($response);exit;
                        //     }
                        //     $photo = $final_image;
                        // } else {
                            $photo = $old_file_photo;
                        // }

                        $query = $dbConn->query("UPDATE ".$tables['amenities']. " SET 
                        category_id = '".$category_id. "',
                        name = '".$name. "',
                        details = '" . $details . "',
                        photo = '" . $photo . "',
                        capacity = '" . $capacity . "',
                        quantity = '" . $quantity . "',
                        amount_per_hour = '" . $amount_per_hour . "',
                        amount_per_night = '" . $amount_per_night . "',
                        status = '".$status."' WHERE id = ".$amenities_id." ");
                        if($query) :
                            $response = [
                                'response' => 'success',
                                'message'  => 'Amenity successfully updated.'
                            ];
                        endif;
                    endif;
                else :
                    $old_file_photo = $dbConn->query("SELECT photo FROM " . $tables['amenities'] . " WHERE id = '" . $amenities_id . "' ")->fetch(PDO::FETCH_OBJ)->photo;
                    // if ($_FILES['image']['name']) {
                    //     if (in_array($ext, $valid_extensions)) {
                    //         $path = $path . strtolower($final_image);
                    //         @unlink('../uploads/' . $old_file_photo); // delete file
                    //         if (move_uploaded_file($tmp, $path));
                    //     } else {
                    //         $response = [
                    //             'response' => 'invalid',
                    //             'message' => 'Invalid file'
                    //         ];
                    //         echo json_encode($response);exit;
                    //     }
                    //     $photo = $final_image;
                    // } else {
                        $photo = $old_file_photo;
                    // }

                    $query = $dbConn->query("UPDATE ".$tables['amenities']. " SET 
                        category_id = '".$category_id. "',
                        name = '".$name. "',
                        details = '" . $details . "',
                        photo = '" . $photo . "',
                        capacity = '" . $capacity . "',
                        quantity = '" . $quantity . "',
                        amount_per_hour = '" . $amount_per_hour . "',
                        amount_per_night = '" . $amount_per_night . "',
                        status = '".$status."' WHERE id = ".$amenities_id." ");
                    if($query) :
                        $response = [
                            'response' => 'success',
                            'message'  => 'Amenity successfully updated.'
                        ];
                    endif;
                endif;
            endif;
        break;
        /* ============= END AMENITIES MODULE =========== */

      
        default:
            # code...
            break;
    }
    echo json_encode($response);
?>