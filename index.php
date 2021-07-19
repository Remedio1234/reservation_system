<?php
    
    /* database connection */
    require_once('library/config.php');
    /* user api requirements */
    require_once('api/user.api.php');
    /* library template */
    require_once('library/Templates.php');

    $data = array(); 
    
    /* get page view  */
    $view = (isset($_GET['v']) && !empty($_GET['v']) ? $_GET['v'] : '');
    
    /* get cdn loaded */
    $cdn = $temp->_cdn(array('a.css', 'b.css'));

    switch ($view) {
        case 'home':
            $page = 'pages/home/page-index.php';
            $data = [
                'conn'      => $dbConn,
                'page'      => 'home',
                'active'    => 'home',
                'title'     => 'Home | '.$site_title,
                'css'       => $temp->_css(
                    [
                        'vendor/font-awesome/css/font-awesome.min.css',   
                        'vendor/bootstrap/css/bootstrap.min.css',
                        'css/heroic-features.css',
                        'vendor/datepicker/css/datetimepicker.css',
                        'vendor/toastr/toastr.css'
                                    ]
                    ),
                    'js' => $temp->_js(
                                    [
                                        'vendor/jquery/jquery.min.js',
                                        'vendor/bootstrap/js/bootstrap.bundle.min.js',
                        'vendor/datepicker/js/moment-with-locales.min.js',
                        'vendor/datepicker/js/datetimepicker.js',
                        'vendor/toastr/toastr.js'
                                    ]
                    )
                ];    
        break;
        case 'contact-us':
            $page = 'pages/contactus/contact.php';
            $data = [
                'conn' => $dbConn,
                'page' => 'contact',
                'active' => 'contact',
                'title' => 'Contact Us | ' . $site_title,
                'css' => $temp->_css(
                    [
                        'vendor/font-awesome/css/font-awesome.min.css',
                        'vendor/bootstrap/css/bootstrap.min.css',
                        'css/heroic-features.css'
                    ]
                ),
                'js' => $temp->_js(
                    [
                        'vendor/jquery/jquery.min.js',
                        'vendor/bootstrap/js/bootstrap.bundle.min.js'
                    ]
                ),

            ];
        break;

        case 'services':
            $page = 'pages/services/services.php';
            $data = [
                'conn' => $dbConn,
                'page' => 'services',
                'active' => 'services',
                'title' => 'Services | ' . $site_title,
                'css' => $temp->_css(
                    [
                        'vendor/font-awesome/css/font-awesome.min.css',
                        'vendor/bootstrap/css/bootstrap.min.css',
                        'css/heroic-features.css'
                    ]
                ),
                'js' => $temp->_js(
                    [
                        'vendor/jquery/jquery.min.js',
                        'vendor/bootstrap/js/bootstrap.bundle.min.js'
                    ]
                ),

            ];
            break;

        case 'dashboard':
            /* check customer account */
            $db->customerCheckIsLogin(@$_SESSION['customer']['isLoggedIn']);
            $page = 'pages/dashboard/page-dashboard.php';
            $data = [
                'conn' => $dbConn,
                'page' => 'dashboard',
                'active' => 'dashboard',
                'title' => 'Dashboard | ' . $site_title,
                'css' => $temp->_css(
                    [
                        'vendor/font-awesome/css/font-awesome.min.css',
                        'vendor/bootstrap/css/bootstrap.min.css',
                        'css/heroic-features.css'
                    ]
                ),
                'js' => $temp->_js(
                    [
                        'vendor/jquery/jquery.min.js',
                        'vendor/bootstrap/js/bootstrap.bundle.min.js'
                    ]
                ),

            ];
        break;

        case 'account':
            /* check customer account */
            $db->customerCheckIsLogin(@$_SESSION['customer']['isLoggedIn']);
            $page = 'pages/dashboard/change-password.php';
            $data = [
                'conn' => $dbConn,
                'page' => 'account',
                'active' => 'account',
                'title' => 'My Account | ' . $site_title,
                'css' => $temp->_css(
                    [
                        'vendor/font-awesome/css/font-awesome.min.css',
                        'vendor/bootstrap/css/bootstrap.min.css',
                        'css/heroic-features.css'
                    ]
                ),
                'js' => $temp->_js(
                    [
                        'vendor/jquery/jquery.min.js',
                        'vendor/bootstrap/js/bootstrap.bundle.min.js'
                    ]
                ),

            ];
        break;

        case 'reservations':
            /* check customer account */
            $db->customerCheckIsLogin(@$_SESSION['customer']['isLoggedIn']);
            $page = 'pages/dashboard/reservations.php';
            $data = [
                'conn' => $dbConn,
                'page' => 'reservations',
                'active' => 'reservations',
                'title' => 'Reservations | ' . $site_title,
                'css' => $temp->_css(
                    [
                        'vendor/font-awesome/css/font-awesome.min.css',
                        'vendor/bootstrap/css/bootstrap.min.css',
                        'css/heroic-features.css'
                    ]
                ),
                'js' => $temp->_js(
                    [
                        'vendor/jquery/jquery.min.js',
                        'vendor/bootstrap/js/bootstrap.bundle.min.js'
                    ]
                ),

            ];
        break;

        case 'information':
                /* check customer account */
            $db->customerCheckIsLogin(@$_SESSION['customer']['isLoggedIn']);
            $page = 'pages/dashboard/page-information.php';
            $data = [
                'conn' => $dbConn,
                'page' => 'information',
                'active' => 'information',
                'title' => 'Information | ' . $site_title,
                'css' => $temp->_css(
                    [
                        'vendor/font-awesome/css/font-awesome.min.css',
                        'vendor/bootstrap/css/bootstrap.min.css',
                        'css/heroic-features.css'
                    ]
                ),
                'js' => $temp->_js(
                    [
                        'vendor/jquery/jquery.min.js',
                        'vendor/bootstrap/js/bootstrap.bundle.min.js'
                    ]
                ),

            ];
        break;

        case 'about':
            $page = 'pages/venues/page-index.php';
            $data = [
                'conn'      => $dbConn,
                'page'      => 'venues',
                'active'    => 'venues',
                'title'     => 'About Us | '.$site_title,
                'css'       =>  $temp->_css(
                            [
                            'vendor/font-awesome/css/font-awesome.min.css',    
                            'vendor/bootstrap/css/bootstrap.min.css',
                            'css/heroic-features.css'
                            ]
                ),
                'js' =>  $temp->_js(
                            [
                            'vendor/jquery/jquery.min.js',
                            'vendor/bootstrap/js/bootstrap.bundle.min.js'
                            ]
                ),

            ];    
        break;


        case 'venue':
            $page = 'pages/home/page-per-venue.php';
            $data = [
                'conn'      => $dbConn,
                'page'      => 'venue',
                'active'    => 'home',
                'title'     => 'Venue Reservation | ' . $site_title,
                'css'       => $temp->_css(
                                [
                                    'vendor/font-awesome/css/font-awesome.min.css',   
                                    'vendor/bootstrap/css/bootstrap.min.css',
                                    'css/heroic-features.css',
                    'vendor/datepicker/css/datetimepicker.css',
                                ]
                ),
                'js' => $temp->_js(
                                [
                                    'vendor/jquery/jquery.min.js',
                                    'vendor/bootstrap/js/bootstrap.bundle.min.js',
                    'vendor/datepicker/js/moment-with-locales.min.js',
                    'vendor/datepicker/js/datetimepicker.js'
                                ]
                ),

            ];
        break;

        case 'receipt':
            $page = 'pages/receipt/receipt.php';
            $data = [
                'conn'      => $dbConn,
                'page'      => 'receipt',
                'active'    => 'home',
                'title'     => 'Reservation Receipt | ' . $site_title,
                'css'       => $temp->_css(
                                [
                                    'vendor/font-awesome/css/font-awesome.min.css',   
                                    'vendor/bootstrap/css/bootstrap.min.css',
                                    'css/heroic-features.css',
                                ]
                ),
                'js' => $temp->_js(
                                [
                                    'vendor/jquery/jquery.min.js',
                                    'vendor/bootstrap/js/bootstrap.bundle.min.js',
                                ]
                ),

            ];
        break;

        case 'login':
            if (isset($_SESSION['customer']['isLoggedIn'])) {
				header("location:?v=home");
			}
            $page = 'pages/account/page-login.php';
            $data = [
                'conn'      => $dbConn,
                'title'     => 'Login | '.$site_title,
                'active'    => 'login',
                'page'      => 'account',
                'css'       =>  $temp->_css(
                                [
                                'vendor/font-awesome/css/font-awesome.min.css',
                                'vendor/bootstrap/css/bootstrap.min.css',
                                'css/heroic-features.css',
                                'css/account-features.css'
                                ]
                ),
                'js' =>  $temp->_js(
                                [
                                'vendor/jquery/jquery.min.js',
                                'vendor/bootstrap/js/bootstrap.bundle.min.js'
                                ]
                ),

            ];    
        break;

        case 'register':
            if (isset($_SESSION['customer']['isLoggedIn'])) {
				header("location:?v=home");
			}
            $page = 'pages/account/page-register.php';
            $data = [
                'conn'      => $dbConn,
                'title'     => 'Register | '.$site_title,
                'active'    => 'register',
                'page'      => 'account',
                'css'       =>  $temp->_css(
                                [
                                'vendor/font-awesome/css/font-awesome.min.css',
                                'vendor/bootstrap/css/bootstrap.min.css',
                                'css/heroic-features.css',
                                'css/account-features.css'
                                ]
                ),
                'js'        =>  $temp->_js(
                                [
                                'vendor/jquery/jquery.min.js',
                                'vendor/bootstrap/js/bootstrap.bundle.min.js'
                                ]
                ),

            ];    
        break;
        
        default:
        header("location:?v=home");
        break;
    }
    /* get company profile */
    $profile = $dbConn->query("SELECT * FROM tbl_profile ")->fetch(PDO::FETCH_ASSOC);
    $data = array_merge($data, $profile);

    $temp->_render('',$page, $data);
?>