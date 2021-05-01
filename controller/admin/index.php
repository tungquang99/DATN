<?php

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

switch ($action) {
        /**Adminstrator */
    case 'logout': {
            session_start();
            $_SESSION = array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(
                    session_name(),
                    '',
                    time() - 60 * 60,
                    $params["path"],
                    $params["domain"],
                    $params["secure"],
                    $params["httponly"]
                );
            }
            unset($_SESSION['username']);
            session_destroy(); // destroy session
            header("location: http://localhost/travel/index.php?controller=admin&action=login");
            require_once('view/admin/logout.php');
            break;
        }
        /**DashBoard */
        // Địa điểm
    case 'dashboard': {
            $tblTable = 'tbl_tour';
            $tour = $db->Tour_count($tblTable);
            $tbl_des = 'tbl_destination';
            $data_des = $db->Show_table($tbl_des);
            $tbl_act = 'tbl_activities';
            $data_act = $db->Show_table($tbl_act);
            $tbl_book = 'tbl_bookings';
            $data_book = $db->BookTour($tbl_book);
            $tbl_dt = 'tbl_bookings';
            $doanhthu = $db->Doanhthu($tbl_dt);
            $tblTable = 'tbl_news';
            $news = $db->Show_table($tblTable);
            $tblTable = 'tbl_contact';
            $contact = $db->Show_table($tblTable);
            require_once('view/admin/dashboard.php');
            break;
        }

        /**/

        /** Quản Lý Tour */
    case 'tour': {
            $tblTable = 'tbl_tour';
            $tour = $db->Tour_count($tblTable);
            $page_item = !empty($_GET['per_page']) ? $_GET['per_page'] : 8;
            $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) *  $page_item;
            $tblTable = 'tbl_tour';
            $data_tour = $db->Show_Tour($tblTable, $page_item, $offset);
            require_once('view/admin/manage_tour.php');
            break;
        }

    case 'add_tour': {
            $tbl_des = 'tbl_destination';
            $data_des = $db->Show_table($tbl_des);
            $tbl_act = 'tbl_activities';
            $data_act = $db->Show_table($tbl_act);

            if (isset($_POST['add_tour'])) {
                $code = $_POST['Code'];
                $name = $_POST['Tour'];
                $chkdes = $_POST['destination'];
                // $chkdes = implode(',', $des);
                $chkact = $_POST['activities'];
                // $chkact = implode(',', $act);
                $startDate = $_POST['startDate'];
                $Timetour = $_POST['Timetour'];
                $price = $_POST['Price'];
                $sale = $_POST['Sale'];
                $content = $_POST['Content'];
                $detail = $_POST['summernote'];
                $img = $_FILES['Picture']['name'];
                $pic = $_FILES['Picture']['tmp_name'];
                $picture = move_uploaded_file($pic, 'admin/Tour_img/' . $img);
                $img1 = $_FILES['Picture1']['name'];
                $pic1 = $_FILES['Picture1']['tmp_name'];
                $picture1 = move_uploaded_file($pic1, 'admin/Tour_img/' . $img1);
                $img2 = $_FILES['Picture2']['name'];
                $pic2 = $_FILES['Picture2']['tmp_name'];
                $picture2 = move_uploaded_file($pic2, 'admin/Tour_img/' . $img2);
                $img3 = $_FILES['Picture3']['name'];
                $pic3 = $_FILES['Picture3']['tmp_name'];
                $picture3 = move_uploaded_file($pic3, 'admin/Tour_img/' . $img3);
                $feature = 'Off';
                if ($db->Insert_Tour($chkdes, $chkact, $code, $name, $startDate, $Timetour, $price, $img, $img1, $img2, $img3, $sale, $content, $detail, $feature)) {
                    $success[] = 'success';
                }
            }
            require_once('view/admin/add_tour.php');
            break;
        }
    case 'update_tour': {
            $tbl_des = 'tbl_destination';
            $data_des = $db->Show_table($tbl_des);
            $tbl_act = 'tbl_activities';
            $data_act = $db->Show_table($tbl_act);
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = 'tbl_tour';
                $data = $db->ShowTourID($tblTable, $id);
            }

            if (isset($_POST['update_tour'])) {
                $name = $_POST['Tour'];
                $chkdes = $_POST['destination'];
                // $chkdes = implode(',', $des);
                $chkact = $_POST['activities'];
                // $chkact = implode(',', $act);
                $startDate = $_POST['startDate'];
                $Timetour = $_POST['Timetour'];
                $price = $_POST['Price'];
                $sale = $_POST['Sale'];
                $content = $_POST['Content'];
                $detail = $_POST['Details'];
                $img = $_FILES['Picture']['name'];
                $pic = $_FILES['Picture']['tmp_name'];
                $picture = move_uploaded_file($pic, 'admin/Tour_img/' . $img);
                $img1 = $_FILES['Picture1']['name'];
                $pic1 = $_FILES['Picture1']['tmp_name'];
                $picture1 = move_uploaded_file($pic1, 'admin/Tour_img/' . $img1);
                $img2 = $_FILES['Picture2']['name'];
                $pic2 = $_FILES['Picture2']['tmp_name'];
                $picture2 = move_uploaded_file($pic2, 'admin/Tour_img/' . $img2);
                $img3 = $_FILES['Picture3']['name'];
                $pic3 = $_FILES['Picture3']['tmp_name'];
                $picture3 = move_uploaded_file($pic3, 'admin/Tour_img/' . $img3);
                if ($db->Update_tour($id, $chkdes, $chkact, $name, $startDate, $Timetour, $price, $img, $img1, $img2, $img3, $sale, $content, $detail)) {
                    $success[] = 'success';
                    header('location: http://localhost/travel/index.php?controller=admin&action=tour');
                }
            }
            require_once('view/admin/update_tour.php');
            break;
        }
    case 'delete_tour': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = 'tbl_tour';
                if ($db->Delete($tblTable, $id)) {
                    header('location: http://localhost/travel/index.php?controller=admin&action=tour');
                };
            }
            break;
        }
    case 'feature_tour': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tbl = 'tbl_tour';
                $db->featureTour($tbl, $id);
            }
            require_once('view/admin/feature.php');
            break;
        }
    case 'feature_tour_off': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tbl = 'tbl_tour';
                $db->featureTour_OFF($tbl, $id);
            }
            require_once('view/admin/feature.php');
            break;
        }

        /**Đia Điểm */
    case 'area': {
            $tblTable = 'tbl_destination';
            $data = $db->Show_table($tblTable);
            require_once('view/admin/manage_area.php');
            break;
        }

    case 'add_area': {
            if (isset($_POST['submit_city'])) {
                $city = $_POST['Fullname'];
                $detail = $_POST['Details'];
                $img = $_FILES['Picture']['tmp_name'];
                $pic = $_FILES['Picture']['name'];
                $picture = move_uploaded_file($img, 'admin/DestinationIMG/' . $pic);
                if ($db->Insert_area($city, $detail, $pic)) {
                    $success[] = 'success';
                }
            }
            require_once('view/admin/add_area.php');
            break;
        }
    case 'update_area': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = 'tbl_destination';
                $data = $db->getDataID($tblTable, $id);
            }
            if (isset($_POST['update_city'])) {
                $city = $_POST['Fullname'];
                $detail = $_POST['Details'];
                $img = $_FILES['Picture']['tmp_name'];
                $pic = $_FILES['Picture']['name'];
                $picture = move_uploaded_file($img, 'admin/DestinationIMG/' . $pic);
                if ($db->Update_are($id, $city, $detail, $pic)) {
                    header('location: http://localhost/travel/index.php?controller=admin&action=area');
                }
            }
            require_once('view/admin/update_area.php');
            break;
        }

        /** Loại Hình Du Lịch*/
    case 'activities': {
            $tblTable = 'tbl_activities';
            $data = $db->Show_table($tblTable);
            require_once('view/admin/manage_activities.php');
            break;
        }
    case 'add_activities': {
            if (isset($_POST['submit_LH'])) {
                $act = $_POST['Fullname'];
                $detail = $_POST['Details'];
                $img = $_FILES['Picture']['tmp_name'];
                $picture = $_FILES['Picture']['name'];
                $picture1 = move_uploaded_file($img, 'admin/ActivitiesIMG/' . $picture);
                if ($db->Insert_act($act, $detail, $picture)) {
                    $success[] = 'success';
                }
            }
            require_once('view/admin/add_activities.php');
            break;
        }
    case 'update_activities': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = 'tbl_activities';
                $data = $db->getdataActID($tblTable, $id);
            }
            if (isset($_POST['update_act'])) {
                $des = $_POST['destination'];
                $act = $_POST['Fullname'];
                $detail = $_POST['Detail'];
                $img = $_FILES['Pic']['tmp_name'];
                $pic = $_FILES['Pic']['name'];
                $picture = move_uploaded_file($img, 'admin/ActivitiesIMG/' . $pic);
                if ($db->Update_are($id, $city, $detail, $pic)) {
                    header('location: http://localhost/travel/index.php?controller=admin&action=area');
                }
            }
            require_once('view/admin/update_activities.php');
            break;
        }
        /**Bookings */
    case 'manage_bookings': {
            $tbl_book = 'tbl_bookings';
            $data = $db->BookTour($tbl_book);


            require_once('view/admin/manage_bookings.php');
            break;
        }
    case 'check_bks': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = 'tbl_bookings';
                $db->checkBks($tblTable, $id);
            }
            require_once('view/admin/checkbookings.php');
            break;
        }
    case 'check_bks_1': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = 'tbl_bookings';
                $db->checkBks_1($tblTable, $id);
            }
            require_once('view/admin/checkbookings.php');
            break;
        }
    case 'delete_bks': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = 'tbl_bookings';
                if ($db->Delete_bks($tblTable, $id)) {
                    header('location: http://localhost/travel/index.php?controller=admin&action=manage_bookings');
                };
            }
            break;
        }
        /**Contact */
    case 'manage_contact': {
            $tblTable = 'tbl_contact';
            $contact = $db->Show_table($tblTable);
            require_once('view/admin/manage_contact.php');
            break;
        }

        /**Đánh giá */
    case 'news': {
            $tblTable = 'tbl_news';
            $news = $db->Show_table($tblTable);
            $page_item = !empty($_GET['per_page']) ? $_GET['per_page'] : 8;
            $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) *  $page_item;
            $tblTable = 'tbl_news';
            $data_news = $db->Show_News($tblTable, $page_item, $offset);
            require_once('view/admin/manage_news.php');
            break;
        }
    case 'add_news': {
            if (isset($_POST['add_news'])) {
                $title = $_POST['Title'];
                $detail = $_POST['Details'];
                $timenews = $_POST['Timenews'];
                $author = $_POST['author'];
                $img = $_FILES['Picture']['name'];
                $pic = $_FILES['Picture']['tmp_name'];
                $picture = move_uploaded_file($pic, 'admin/NewsIMG/' . $img);
                if ($db->Insert_news($title, $detail, $timenews, $author, $img)) {
                    $success[] = 'success';
                }
            }
            require_once('view/admin/add_news.php');
            break;
        }
    case 'update_news': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = 'tbl_news';
                $data = $db->ShowNewsID($tblTable, $id);
            }

            if (isset($_POST['update_news'])) {
                $title = $_POST['Title'];
                $detail = $_POST['Details'];
                $timenews = $_POST['Timenews'];
                $author = $_POST['author'];
                $img = $_FILES['Picture']['name'];
                $pic = $_FILES['Picture']['tmp_name'];
                $picture = move_uploaded_file($pic, 'admin/NewsIMG/' . $img);
                if ($db->Update_news($id, $title, $detail, $timenews, $author, $img)) {
                    $success[] = 'success';
                    header('location: http://localhost/travel/index.php?controller=admin&action=news');
                }
            }
            require_once('view/admin/update_news.php');
            break;
        }
    case 'delete_news': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = 'tbl_news';
                if ($db->Delete($tblTable, $id)) {
                    header('location: http://localhost/travel/index.php?controller=admin&action=news');
                };
            }
            break;
        }
    case 'about_us': {
            $tblTable = 'tbl_about_us';
            $about = $db->Show_table($tblTable);
            require_once('view/admin/about_us.php');
            break;
        }
    case 'update_about': {
            $tblTable = 'tbl_about_us';
            $about = $db->Showtable($tblTable);
            if (isset($_POST['update_news'])) {
                $title = $_POST['Title'];
                $detail = $_POST['Details'];
                $timenews = $_POST['Timenews'];
                $author = $_POST['author'];
                $img = $_FILES['Picture']['name'];
                $pic = $_FILES['Picture']['tmp_name'];
                $picture = move_uploaded_file($pic, 'admin/NewsIMG/' . $img);
                if ($db->Update_news($id, $title, $detail, $timenews, $author, $img)) {
                    $success[] = 'success';
                    header('location: http://localhost/travel/index.php?controller=admin&action=about_us');
                }
            }
            require_once('view/admin/update_about.php');
            break;
        }
        /**Mặc định */
    default: {
            session_start();
            if (isset($_POST['login'])) {
                $user = $_POST['username'];
                $pass = md5($_POST['password']);
                $tbl_Admin = 'tbl_admin';
                if ($db->checkAdmin($tbl_Admin, $user, $pass)) {
                    //echo "Thành Công"
                }
            }
            require_once('view/admin/login.php');
            break;
        }
}
