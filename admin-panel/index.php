<?php
    /* database connection */
    require_once('../library/config.php');
    /* user api requirements */
    require_once('../api/user.api.php');
    /* library template */
    require_once('../library/Templates.php');

    $data = array(); 

    /* check user account */
    $db->userCheckIsLogin(@$_SESSION['user']['isLoggedIn']);
    
    /* get page view  */
    $view = (isset($_GET['v']) && !empty($_GET['v']) ? $_GET['v'] : '');
    
    /* get company profile */
    $profile = $dbConn->query("SELECT * FROM tbl_profile ")->fetch(PDO::FETCH_ASSOC);
    
    /* get cdn loaded */
    $cdn = $temp->_cdn(array('a.css','b.css'));
  
    switch ($view) {
        case 'dashboard':
            $page = 'pages/dashboard/dashboard.php';
            $data = [
                'conn'   => $dbConn,
                'page'   => 'dashboard',
                'active' => 'dashboard', 
                'title'  => 'Dashboard | Admin '.$site_title,
                'css'    =>  $temp->_css(
                    [
                    'vendor/bootstrap/css/bootstrap.min.css',
                    'vendor/font-awesome/css/font-awesome.min.css',
                    'vendor/datatables/dataTables.bootstrap4.css',
                    'css/sb-admin.css'
                    ]
                ),
                'js' =>  $temp->_js(
                    [
                    'vendor/jquery/jquery.min.js',
                    'vendor/bootstrap/js/bootstrap.bundle.min.js',
                    'vendor/jquery-easing/jquery.easing.min.js',
                    'vendor/datatables/jquery.dataTables.js',
                    'vendor/datatables/dataTables.bootstrap4.js',
                    'js/sb-admin.min.js',
                    ]
                ),

            ];    
        break;

        case 'category':
            $page = 'pages/category/category.php';
            $data = [
                'conn'   => $dbConn,
                'page'   => 'category',
                'active' => 'category', 
                'title'  => 'Category | Admin '.$site_title,
                'css'    =>  $temp->_css(
                    [
                    'vendor/bootstrap/css/bootstrap.min.css',
                    'vendor/font-awesome/css/font-awesome.min.css',
                    'vendor/datatables/dataTables.bootstrap4.css',
                    'css/sb-admin.css'
                    ]
                ),
                'js' =>  $temp->_js(
                    [
                    'vendor/jquery/jquery.min.js',
                    'vendor/bootstrap/js/bootstrap.bundle.min.js',
                    'vendor/jquery-easing/jquery.easing.min.js',
                    'vendor/datatables/jquery.dataTables.js',
                    'vendor/datatables/dataTables.bootstrap4.js',
                    'js/sb-admin.min.js',
                    ]
                ),

            ];    
        break;

        case 'amenities':
            $page = 'pages/amenities/amenities.php';
            $data = [
                'conn'   => $dbConn,
                'page'   => 'amenities',
                'active' => 'amenities', 
                'title'  => 'Amenities | Admin '.$site_title,
                'css'    =>  $temp->_css(
                    [
                    'vendor/bootstrap/css/bootstrap.min.css',
                    'vendor/font-awesome/css/font-awesome.min.css',
                    'vendor/datatables/dataTables.bootstrap4.css',
                    'css/sb-admin.css'
                    ]
                ),
                'js' =>  $temp->_js(
                    [
                    'vendor/jquery/jquery.min.js',
                    'vendor/bootstrap/js/bootstrap.bundle.min.js',
                    'vendor/jquery-easing/jquery.easing.min.js',
                    'vendor/datatables/jquery.dataTables.js',
                    'vendor/datatables/dataTables.bootstrap4.js',
                    'js/sb-admin.min.js',
                    ]
                ),

            ];    
        break;

        case 'caterers':
            $page = 'pages/caterers/caterers.php';
            $data = [
                'conn'   => $dbConn,
                'page'   => 'caterers',
                'active' => 'caterers', 
                'title'  => 'Caterers | Admin '.$site_title,
                'css'    =>  $temp->_css(
                    [
                    'vendor/bootstrap/css/bootstrap.min.css',
                    'vendor/font-awesome/css/font-awesome.min.css',
                    'vendor/datatables/dataTables.bootstrap4.css',
                    'css/sb-admin.css'
                    ]
                ),
                'js' =>  $temp->_js(
                    [
                    'vendor/jquery/jquery.min.js',
                    'vendor/bootstrap/js/bootstrap.bundle.min.js',
                    'vendor/jquery-easing/jquery.easing.min.js',
                    'vendor/datatables/jquery.dataTables.js',
                    'vendor/datatables/dataTables.bootstrap4.js',
                    'js/sb-admin.min.js',
                    ]
                ),

            ];    
        break;

        case 'reservations':
            $page = 'pages/reservations/reservations.php';
            $data = [
                'conn'   => $dbConn,
                'page'   => 'reservations',
                'active' => 'reservations', 
                'title'  => 'Reservations | Admin '.$site_title,
                'css'    =>  $temp->_css(
                    [
                    'vendor/bootstrap/css/bootstrap.min.css',
                    'vendor/font-awesome/css/font-awesome.min.css',
                    'vendor/datatables/dataTables.bootstrap4.css',
                    'css/sb-admin.css'
                    ]
                ),
                'js' =>  $temp->_js(
                    [
                    'vendor/jquery/jquery.min.js',
                    'vendor/bootstrap/js/bootstrap.bundle.min.js',
                    'vendor/jquery-easing/jquery.easing.min.js',
                    'vendor/datatables/jquery.dataTables.js',
                    'vendor/datatables/dataTables.bootstrap4.js',
                    'js/sb-admin.min.js',
                    ]
                ),

            ];    
        break;

        case 'customers':
            $page = 'pages/customers/customers.php';
            $data = [
                'conn'   => $dbConn,
                'page'   => 'customers',
                'active' => 'customers', 
                'title'  => 'Customers | Admin '.$site_title,
                'css'    =>  $temp->_css(
                    [
                    'vendor/bootstrap/css/bootstrap.min.css',
                    'vendor/font-awesome/css/font-awesome.min.css',
                    'vendor/datatables/dataTables.bootstrap4.css',
                    'css/sb-admin.css'
                    ]
                ),
                'js' =>  $temp->_js(
                    [
                    'vendor/jquery/jquery.min.js',
                    'vendor/bootstrap/js/bootstrap.bundle.min.js',
                    'vendor/jquery-easing/jquery.easing.min.js',
                    'vendor/datatables/jquery.dataTables.js',
                    'vendor/datatables/dataTables.bootstrap4.js',
                    'js/sb-admin.min.js',
                    ]
                ),

            ];    
        break;

        case 'settings':
            $page = 'pages/settings/profile.php';
            $data = [
                'conn'   => $dbConn,
                'page'   => 'settings',
                'active' => 'settings', 
                'title'  => 'Settings | Admin '.$site_title,
                'css'    =>  $temp->_css(
                    [
                    'vendor/bootstrap/css/bootstrap.min.css',
                    'vendor/font-awesome/css/font-awesome.min.css',
                    'css/sb-admin.css'
                    ]
                ),
                'js' =>  $temp->_js(
                    [
                    'vendor/jquery/jquery.min.js',
                    'vendor/bootstrap/js/bootstrap.bundle.min.js',
                    'vendor/jquery-easing/jquery.easing.min.js',
                    'js/sb-admin.min.js',
                    ]
                ),

            ];    
        break;

        case 'reports':
            $page = 'pages/reports/reports.php';
            $data = [
                'conn'   => $dbConn,
                'page'   => 'reports',
                'active' => 'reports', 
                'title'  => 'Reports | Admin '.$site_title,
                'css'    =>  $temp->_css(
                    [
                    'vendor/bootstrap/css/bootstrap.min.css',
                    'vendor/font-awesome/css/font-awesome.min.css',
                    'css/sb-admin.css'
                    ]
                ),
                'js' =>  $temp->_js(
                    [
                    'vendor/jquery/jquery.min.js',
                    'vendor/bootstrap/js/bootstrap.bundle.min.js',
                    'vendor/jquery-easing/jquery.easing.min.js',
                    'js/sb-admin.min.js',
                    'js/tableexport.js',
                    'js/exportformat.js'
                    ]
                ),

            ];    
        break;
        default:
            header("location:?v=dashboard");
        break;
    }

   $data = array_merge($data,$profile);
   
   $temp->_render('../admin-panel/',$page, $data);
?>