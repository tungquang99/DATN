<!DOCTYPE html>
<html lang="en">

<head>
   
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
                        <a href="" class="nav-link">Tin Tức</a>
                    </li>
                </ul>
            </div>
        </div>
        </header>
        <!--BODY-->
        <div class="container content">
            <h1>TIN TỨC</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus magni labore ab molestiae cumque voluptas perspiciatis hic incidunt, necessitatibus nobis explicabo iure architecto commodi dicta veritatis minus distinctio quo laborum?</p>
            <div class="row tour">
                <?php
                $totalRecords = count($news);
                $totalPage = ceil($totalRecords / $page_item);
                foreach ($data_news as $value) {
                ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12 ">
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
            <div class="pagination ">
                <?php
                for ($num = 1; $num <= $totalPage; $num++) { ?>
                    <?php if ($num != $current_page) { ?>
                        <a href="http://localhost/travel/client.php?controller=client&action=tour&per_page=<?= $page_item ?>&page=<?= $num ?>"><?= $num ?></a>
                    <?php } else { ?>
                        <span class="active"><?= $num ?></span>
                    <?php } ?>

                <?php } ?>
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