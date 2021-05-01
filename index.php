<!DOCTYPE HTML>
<html>

<head>
    <title>Quản Trị Tour Du Lịch</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="admin/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="admin/css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="admin/css/morris.css" type="text/css" />
    <!-- Graph CSS -->
    <link href="admin/css/font-awesome.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="admin/js/jquery-2.1.4.min.js"></script>
    <!-- tables -->
    <link rel="stylesheet" type="text/css" href="admin/css/table-style.css" />
    <link rel="stylesheet" type="text/css" href="admin/css/basictable.css" />
    <script type="text/javascript" src="admin/js/jquery.basictable.min.js"></script>
    <!-- //jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="admin/css/icon-font.min.css" type='text/css' />
    <link rel="stylesheet" href="admin/css/summernote-bs3.css">
    <link rel="stylesheet" href="admin/css/summernote.css">
    <link rel="stylesheet" href="style.css" />
    <!-- //lined-icons -->
    <style type='text/css'>
        body a {
            background: none !important;
        }

        select#destination,
        select#activities {
            padding: 10px 15px;
            text-transform: none;
        }

        .pagination {
            display: flex !important;
            justify-content: flex-end !important;
        }

        .pagination a {
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 1px 6px;
            margin: 1px;
            color: #000;
            opacity: 0.7;
            font-size: 1rem;
        }

        .pagination .active {
            border: 1px solid #0066ff;
            padding: 1px 6px;
            margin: 1px;
            color: #fff;
            background-color: #0066ff;
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <script src="admin/js/jquery.nicescroll.js"></script>
    <script src="admin/ckeditor/ckeditor.js"></script>
    <script src="admin/js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="admin/js/bootstrap.min.js"></script>
    <!-- /Bootstrap Core JavaScript -->
    <!-- morris JavaScript -->
    <script src="admin/js/raphael-min.js"></script>
    <script src="admin/js/morris.js"></script>
</body>

</html>

<?php
include "model/db_config.php";
$db = new Database;
$db->connect();

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = '';
}

switch ($controller) {
    case 'admin': {
            require_once('controller/admin/index.php');
        }
}
?>