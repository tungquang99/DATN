<body>
    <div class="app">
        <!--HEADER-->
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a href="http://localhost/travel/client.php?controller=client&action=index" class="navbar-branch">
                        <img src="./assets/img/logo.png" alt="logo" class="logo">
                    </a>
                    <div class="bar_menu">
                        <i class="fas fa-bars    "></i>
                    </div>
                    <div class="navbar-collapse menu">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="http://localhost/travel/client.php?controller=client&action=about_us" class="nav-link">Về chúng tôi</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://localhost/travel/client.php?controller=client&action=destination" class="nav-link">Địa điểm du lịch</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://localhost/travel/client.php?controller=client&action=activities" class="nav-link">Loại hình tour</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://localhost/travel/client.php?controller=client&action=tour" class="nav-link">Tour</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://localhost/travel/client.php?controller=client&action=news" class="nav-link">Tin tức</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://localhost/travel/client.php?controller=client&action=contact" class="nav-link">Liên hệ</a>
                            </li>
                        </ul>
                        <div class="close_menu">
                            <i class="fas fa-times    "></i>
                        </div>
                    </div>

                </div>
            </nav>
            <div id="slides" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#slides" data-slide-to="0" class="active"></li>
                    <li data-target="#slides" data-slide-to="1"></li>
                    <li data-target="#slides" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/2.jpg" alt="">
                        <div class="bg"></div>

                    </div>
                    <div class="carousel-item ">
                        <img src="assets/img/9.jpg" alt="">
                        <div class="bg"></div>
                    </div>
                    <div class="carousel-item ">
                        <img src="assets/img/18.jpg" alt="">
                        <div class="bg"></div>

                    </div>
                </div>
            </div>
            <div class="container search_tour">
                <form action="" method="get" class="row">
                    <select name="controller" style="display:none;">
                        <option value="client"></option>
                    </select>
                    <select name="search_des" id="destination" class="col-xl-3 col-lg-3 col-md-12 col-xs-12">
                        <option value="">Chọn nơi đến</option>
                        <?php
                        foreach ($data_des as $value) {
                        ?>
                            <option value="<?php echo $value['id_destination']; ?>"><?php echo $value['Name_city']; ?></option>
                        <?php } ?>
                    </select>
                    <select name="search_act" id="activity" class="col-xl-3 col-lg-3 col-md-12 col-xs-12">
                        <option value="">Chọn loại hình tour</option>
                        <?php
                        foreach ($data_act as $value) {
                        ?>
                            <option value="<?php echo $value['id_activities']; ?>"><?php echo $value['Name_LH']; ?></option>
                        <?php } ?>
                    </select>
                    <button class="btn_search col-xl-2 col-lg-2 col-md-12 col-xs-12" type="submit" name="action" value="tourbycat">Tìm Kiếm </button>
                </form>


            </div>
        </header>
        <!--BODY-->
        <div class="fluid-container body">
            <!--GT-->
            <div class="container about">
                <div class="row">
                    <div class="col-xl-7 col-lg-6 about_us">
                        <h1 class="display-4">
                            HÃY CHỌN TRAVEL T3
                        </h1>
                        <p>1.000 lý do tại sao bạn nên chọn đến với chung tôi TravelGo, có 1 thế giới tuyệt đẹp quanh ta hãy đến với chúng tôi.</p>
                        <p>Chưa có kinh nghiệm tổ chức và triển khai các tour du lịch trong, chúng tôi cam kết đem lại cho khách hàng những hành trình tuyệt vời và ấn tượng nhất thông qua những dịch vụ chuyên nghiệp mà chúng tôi thực hiện như:</p>
                        <div class="row about_us-service">
                            <div class="col-xl-4 col-lg-6 col-sm-4">
                                <i class="fas fa-fighter-jet"></i>
                                Chuyến bay đẳng cấp
                            </div>
                            <div class="col-xl-4 col-lg-6 col-sm-4">
                                <i class="fas fa-ship"></i>
                                Hành trình hấp dẫn
                            </div>
                            <div class="col-xl-4 col-lg-6 col-sm-4">
                                <i class="fas fa-history"></i>
                                Quản lí chặt chẽ
                            </div>
                            <div class="col-xl-4 col-lg-6 col-sm-4">
                                <i class="fas fa-university"></i>
                                Khách sạn tiện nghi
                            </div>
                            <div class="col-xl-4 col-lg-6 col-sm-4">
                                <i class="fas fa-check"></i>
                                Chất lượng đỉnh cao
                            </div>
                            <div class="col-xl-4 col-lg-6 col-sm-4">
                                <i class="fas fa-globe"></i>
                                Uy tín với khách hàng
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <img src="assets/img/about.png" alt="">
                    </div>
                </div>
            </div>
            <!--Tour-->
            <div class="container feature_new">
                <div class="btnFeature_new">
                    <ul class="nav tabs">
                        <li class="nav-item feature tab-item active" data-tour="tour_feature">Nổi Bật</li>
                        <li class="nav-item tab-item " data-tour="tour_news">Mới Nhất</li>
                    </ul>
                    <a href="http://localhost/travel/client.php?controller=client&action=tour" class="view_all_tour">Xem thêm tour</a>
                </div>
                <div class="container limit_tour tour_feature show " id="tour_feature">
                    <div class="owl-carousel row">
                        <?php
                        foreach ($fea_tour as $value) {
                        ?>
                            <div class="">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="admin/Tour_img/<?php echo $value['Img']; ?>" alt="">
                                        <div class="destination_tour">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <?php echo $value['Name_city']; ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href=""><?php echo $value['Name_tour']; ?></a>
                                        <p>
                                            <i class="fa fa-clock"></i>
                                            <?php echo $value['startDate']; ?> / <?php echo $value['time_tour']; ?>
                                        </p>
                                        <span><?php echo $value['Price']; ?> VNĐ</span>
                                        <strike>
                                            <?php
                                            if ($value['Sale'] == "") {
                                                echo "";
                                            } else {
                                                echo $value['Sale'] . 'VNĐ';
                                            }
                                            ?>
                                        </strike>
                                    </div>
                                    <div class="view_more">
                                        Chi tiết Tour
                                        <a href="http://localhost/travel/client.php?controller=client&action=chitietTour&id=<?php echo $value['id_tour']; ?>" class="btn ">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="container  limit_tour tour_news" id="tour_news">
                    <div class="owl-carousel row">
                        <?php
                        foreach ($data_tour as $value) {
                        ?>
                            <div class="col-xl-3 col-lg-6 col-md-6 ">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="admin/Tour_img/<?php echo $value['Img']; ?>" alt="">
                                        <div class="destination_tour">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <?php echo $value['Name_city']; ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href=""><?php echo $value['Name_tour']; ?></a>
                                        <p>
                                            <i class="fa fa-clock"></i>
                                            <?php echo $value['startDate']; ?> / <?php echo $value['time_tour']; ?>
                                        </p>
                                        <span><?php echo $value['Price']; ?></span>
                                        <strike><?php echo $value['Sale']; ?></strike>
                                    </div>
                                    <div class="view_more">
                                        Chi tiết Tour
                                        <a href="http://localhost/travel/client.php?controller=client&action=chitietTour&id=<?php echo $value['id_tour']; ?>" class="btn ">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--Địa điểm-->
            <div class="container destination">
                <h1>CÁC ĐIỂM ĐẾN PHỔ BIẾN</h1>
                <p>
                    Những địa điểm du lịch hot nhất dịp Tết ở Việt Nam.
                    <br>
                    Tham khảo những điểm du lịch đặc sắc nhất từ Bắc tới Nam cùng với chúng tôi.
                </p>
            </div>
            <div class="row city">
                <?php
                foreach ($data_des as $value) {
                ?>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <img src="admin/DestinationIMG/<?php echo $value['Picture']; ?>" alt="">
                        <div class="destination_tour">
                            <i class="fas fa-map-marker-alt"></i>
                            <?php echo $value['Name_city']; ?>
                        </div>
                        <div class="city_body">
                            <h2><?php echo $value['Name_city']; ?></h2>
                            <p>
                                <?php echo $value['Details']; ?>
                            </p>
                            <a href="http://localhost/travel/client.php?controller=client&action=tourbycat&id_des=<?php echo $value['id_destination']; ?>" class="btn btn-outline-light view_all">Xem</a>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <!--Tin tức-->
            <div class="container news">
                <h1>Tin Tức</h1>
                <p>Cẩm nang thông tin về du lịch, văn hóa, ẩm thực, các sự kiện và lễ hội tại các điểm đến Việt nam, Đông Nam Á và Thế Giới.</p>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <?php
                                foreach ($news as $value) {
                                ?>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="card">
                                            <div class="card-img">
                                                <img src="admin/NewsIMG/<?php echo $value['Picture']; ?>" alt="">
                                            </div>
                                            <div class="card-body">
                                                <a href="http://localhost/travel/client.php?controller=client&action=detailnews&id=<?php echo $value['id_news']; ?>"><?php echo $value['Title']; ?></a>
                                                <ul class="nav">
                                                    <li class="nav-item underline">
                                                        <i class="fas fa-clock"></i>
                                                        <?php echo $value['Time_news']; ?>
                                                    </li>
                                                    <li class="nav-item">Bởi:<?php echo $value['author']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <a href="#" class="topTop">
                <i class="fas fa-chevron-up"></i>
            </a>
            <!--FOOTER-->
            <?php include('assets/includes/footer.php') ?>
        </div>
</body>

</html>