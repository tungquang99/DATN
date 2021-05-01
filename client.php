<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="app.css">
    <title>Document</title>
    <!--JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/app.js"></script>

</head>

<body>
    <style>
        .pagination {
            display: flex !important;
            justify-content: flex-end !important;
        }

        .pagination a {
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 5px 10px;
            margin: 50px 5px 5px;
            color: #000;
            opacity: 0.7;
            font-size: 1.6rem;
        }

        .pagination .active {
            border: 1px solid #0066ff;
            padding: 5px 10px;
            margin: 50px 5px 5px;
            color: #fff;
            background-color: #0066ff;
            font-size: 1.6rem;
        }
    </style>
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
    case 'client': {
            require_once('controller/client/index.php');
        }
}
?>