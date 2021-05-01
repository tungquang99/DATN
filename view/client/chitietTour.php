<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        <?php include('assets/includes/header.php'); ?>
        <div class="fluid-container title">
                    <div class="container">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="http://localhost/travel/client.php?controller=client&action=index" class="nav-link">Trang chủ</a>
                            </li>
                            <i class="fas fa-angle-double-right "></i>
                            <li class="nav-item">
                                <a href="" class="nav-link">Chi tiết Tour</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
        <!--BODY-->
        <div class="container content">
            <div class="row detail_tour">
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <img src="admin/Tour_img/<?php echo $ctTour['Img']; ?>" alt="" id="main-img">
                    <ul class="nav mobile">
                        <li class="nav-item">
                            <img src="admin/Tour_img/<?php echo $ctTour['Img']; ?>" onclick="changeImg('one')" id="one">
                        </li>
                        <li class="nav-item">
                            <img src="admin/Tour_img/<?php echo $ctTour['Img1']; ?>" onclick="changeImg('two')" id="two">
                        </li>
                        <li class="nav-item">
                            <img src="admin/Tour_img/<?php echo $ctTour['Img2']; ?>" onclick="changeImg('three')" id="three">
                        </li>
                        <li class="nav-item">
                            <img src="admin/Tour_img/<?php echo $ctTour['Img3']; ?>" onclick="changeImg('four')" id="four">
                        </li>
                    </ul>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <h2><?php echo $ctTour['Name_tour']; ?></h2>
                    <p><?php echo $ctTour['Code']; ?></p>
                    <hr>
                    <div class="time_tour">
                        <i class="fas fa-clock"></i>
                        <?php echo $ctTour['startDate']; ?> (<?php echo $ctTour['time_tour']; ?>)
                    </div>
                    <div class="time_tour">
                        <i class="fas fa-map-marker"></i>
                        Địa điểm: <?php echo $ctTour['Name_city']; ?>
                    </div>
                    <hr>
                    <span><?php echo $ctTour['Price']; ?> VNĐ</span>
                    <strike><?php
                            if ($ctTour['Sale'] == "") {
                                echo "";
                            } else {
                                echo $ctTour['Sale'] . 'VNĐ';
                            }
                            ?>
                    </strike>
                    <div>
                        <a class="btn btn_book_tour" type="button" href="http://localhost/travel/client.php?controller=client&action=bookings&id=<?php echo $ctTour['id_tour']; ?>">Đặt Tour Ngay</a>
                    </div>
                    <ul class="nav desktop">
                        <li class="nav-item">
                            <img src="admin/Tour_img/<?php echo $ctTour['Img']; ?>" onclick="changeImg('one')" id="one">
                        </li>
                        <li class="nav-item">
                            <img src="admin/Tour_img/<?php echo $ctTour['Img1']; ?>" onclick="changeImg('two')" id="two">
                        </li>
                        <li class="nav-item">
                            <img src="admin/Tour_img/<?php echo $ctTour['Img2']; ?>" onclick="changeImg('three')" id="three">
                        </li>
                        <li class="nav-item">
                            <img src="admin/Tour_img/<?php echo $ctTour['Img3']; ?>" onclick="changeImg('four')" id="four">
                        </li>
                    </ul>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="navbar-example">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#introduce" role="tab">Giới Thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#standard" role="tab">Tiêu Chuẩn</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#programme" role="tab">Chương Trình Tour</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#note" role="tab">Lưu Ý</a>
                            </li>
                        </ul>
                        <!-- Tab panes {Fade}  -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="introduce" name="introduce" role="tabpanel">
                                <p>
                                    <?php echo $ctTour['Content']; ?>
                                </p>
                            </div>
                            <div class="tab-pane fade" id="standard" role="standard">
                                <ul>
                                    <li>Đưa đón miễn phí</li>
                                    <li>Bảo hiểm an toàn</li>
                                    <li>Ăn uống miễn phí</li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="programme" name="programme" role="tabpanel">
                                <?php echo $ctTour['CtTour']; ?>
                            </div>
                            <div class="tab-pane fade" id="note" name="note" role="tabpanel"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="topTop">
            <i class="fas fa-chevron-up"></i>
        </a>
        <!--FOOTER-->
        <?php include('assets/includes/footer.php'); ?>
    </div>
   
</body>

</html>