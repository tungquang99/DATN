<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <!--Bootstrap CSS-->
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous"
        >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
        <link rel="stylesheet" href="./assets/fonts/fontawesome-free-5.13.0-web/css/all.min.css">
        <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="./assets/css/style.css">
        <link rel="stylesheet" href="./assets/css/main.css">
        <link rel="stylesheet" href="./assets/css/responsive.css">
        <title>Document</title>
        <!--JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js"></script>
        <script src="./assets/js/main.js"></script>
        <script src="./assets/js/owl.carousel.min.js"></script>
    </head>
    <body>
        <div class="app">
            <!--HEADER-->
            <?php include('assets/includes/header.php');?>
            <div class="fluid-container title">
                    <div class="container">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="http://localhost/travel/client.php?controller=client&action=index" class="nav-link">Trang chủ</a>
                            </li>
                            <i class="fas fa-angle-double-right "></i>
                            <li class="nav-item">
                                <a href="" class="nav-link">Loại Hình Tour</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <!--BODY-->
            <div class="container content">
                <h1>LOẠI HÌNH DU LỊCH</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus magni labore ab molestiae cumque voluptas perspiciatis hic incidunt, necessitatibus nobis explicabo iure architecto commodi dicta veritatis minus distinctio quo laborum?</p>
                <div class="row city">
                <?php
                foreach ($data as $value) {
                ?>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <img src="admin/ActivitiesIMG/<?php echo $value['Picture']; ?>" alt="">
                        <div class="city_body">
                            <h2><?php echo $value['Name_LH']; ?></h2>
                            <p>
                                <?php echo $value['Details']; ?>
                            </p>
                            <a href="http://localhost/travel/client.php?controller=client&action=tourbycat&id_act=<?php echo $value['id_activities']; ?>" class="btn btn-outline-light view_all">Xem chi tiết</a>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
            <a href="#" class="topTop">
                <i class="fas fa-chevron-up"></i>
            </a>
            <!--FOOTER-->
            <?php include('assets/includes/footer.php');?>
        </div>
    </body>
</html>
