<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}

switch ($action) {
    case 'index': {
            $tbltour = 'tbl_tour';
            $data_tour = $db->Tour($tbltour);
            $tbltour = 'tbl_tour';
            $fea_tour = $db->Fea_Tour($tbltour);
            $tbldes = 'tbl_destination';
            $data_des = $db->Show_table($tbldes);
            $tblTable = 'tbl_news';
            $news = $db->Show_table($tblTable);
            $tblact = 'tbl_activities';
            $data_act = $db->Show_table($tblact);
            require_once('view/client/index.php');
            break;
        }

    case 'about_us': {
            $tblTable = 'tbl_about_us';
            $about = $db->Show_table($tblTable);
            require_once('view/client/aboutus.php');
            break;
        }

    case 'destination': {
            $tbldes = 'tbl_destination';
            $data_des = $db->Show_table($tbldes);
            require_once('view/client/destination.php');
            break;
        }

    case 'activities': {
            $tblact = 'tbl_activities';
            $data = $db->Show_table($tblact);
            require_once('view/client/activities.php');
            break;
        }
    case 'tour': {
            $tblTable = 'tbl_tour';
            $tour = $db->Tour_count($tblTable);
            $page_item = !empty($_GET['per_page']) ? $_GET['per_page'] : 12;
            $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) *  $page_item;
            $tblTable = 'tbl_tour';
            $data_tour = $db->Show_Tour($tblTable, $page_item, $offset);
            require_once('view/client/tour.php');
            break;
        }
    case 'tourbycat': {
            if (
                isset($_GET['id_des']) ||  isset($_GET['id_act']) ||
                (isset($_GET['search_des']) && $_GET['search_act'] == "") ||
                (isset($_GET['search_act']) && $_GET['search_des'] == "")
            ) {

                if (isset($_GET['id_des']))  $id = $_GET['id_des'];

                if (isset($_GET['search_des']) && $_GET['search_act'] == "")  $id = $_GET['search_des'];

                if (isset($_GET['id_act']))  $id = $_GET['id_act'];

                if (isset($_GET['search_act']) && $_GET['search_des'] == "")  $id = $_GET['search_act'];

                $tblTable = 'tbl_tour';
                $data = $db->search_ID($tblTable, $id);
                $tbl_des = 'tbl_destination';
                $data_des = $db->getDataID($tbl_des, $id);
                $tbl_act = 'tbl_activities';
                $data_act = $db->getdataActID($tbl_act, $id);
            }

            if (isset($_GET['search_des']) && isset($_GET['search_act'])) {
                $id_des = $_GET['search_des'];
                $id_act = $_GET['search_act'];

                $tblTable = 'tbl_tour';
                $data = $db->search_Category($tblTable, $id_des, $id_act);
                $tbl_des = 'tbl_destination';
                $data_des = $db->getDataID($tbl_des, $id_des);
            }

            /** Lọc */
            if (isset($_POST['search'])) {

                if (isset($_GET['id_des']) || (isset($_GET['search_des']) && $_GET['search_act'] == ""))  $start = $_POST['id_act'];

                if (isset($_GET['id_act']) || (isset($_GET['search_act']) && $_GET['search_des'] == ""))  $start = $_POST['id_des'];

                if (isset($_GET['id_des'])) $id = $_GET['id_des'];

                if (isset($_GET['id_act'])) $id = $_GET['id_act'];

                if (isset($_GET['search_des']) && $_GET['search_act'] == "")  $id = $_GET['search_des'];

                if (isset($_GET['search_act']) && $_GET['search_des'] == "")  $id = $_GET['search_act'];

                $tblTable = 'tbl_tour';
                $data = $db->select_Category($tblTable, $start, $id);
            }

            $tbldes = 'tbl_destination';
            $search_des = $db->Show_table($tbldes);
            $tblact = 'tbl_activities';
            $search_act = $db->Show_table($tblact);

            require_once('view/client/tourbycat.php');
            break;
        }

    case 'chitietTour': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = 'tbl_tour';
                $ctTour = $db->ShowTourID($tblTable, $id);
            }


            require_once('view/client/chitietTour.php');
            break;
        }

    case 'bookings': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = 'tbl_tour';
                $ctTour = $db->ShowTourID($tblTable, $id);
            }
            if (isset($_POST['bookings'])) {
                $idtour = intval($_GET['id']);
                $fname = $_POST['fname'];
                $mobile = $_POST['mobile'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $person = $_POST['person'];
                $Date_tour = $_POST['datetour'];
                $status = 'Chờ xử lý';
                $total = $_POST['total'];
                if ($db->Booking($idtour, $fname, $mobile, $email, $address, $person, $Date_tour, $status, $total)) {
                    $success_book[] = 'success_book';
                }
            }
            require_once('view/client/bookings.php');
            break;
        }
    case 'pay': {
            require_once('view/client/Pay.php');
            break;
        }


    case 'contact': {
            if (isset($_POST['contact'])) {
                $fname = $_POST['fname'];
                $mobile = $_POST['mobile'];
                $email = $_POST['email'];
                $content = $_POST['content'];
                if ($db->Contact($fname, $mobile, $email, $content)) {
                    $success_book[] = 'success_book';
                }
            }
            require_once('view/client/lienhe.php');
            break;
        }
    case 'news': {
            $tblTable = 'tbl_news';
            $news = $db->Show_table($tblTable);
            $page_item = !empty($_GET['per_page']) ? $_GET['per_page'] : 12;
            $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) *  $page_item;
            $tblTable = 'tbl_news';
            $data_news = $db->Show_News($tblTable, $page_item, $offset);
            require_once('view/client/tintuc.php');
            break;
        }

    case 'detailnews': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = 'tbl_news';
                $detailNews = $db->ShowNewsID($tblTable, $id);
            }
            $tblTable = 'tbl_news';
            $news = $db->Show_table($tblTable);
            require_once('view/client/Detail_news.php');
            break;
        }
        /**Mặc định */
    default: {
            require_once('view/client/index.php');
            break;
        }
}
