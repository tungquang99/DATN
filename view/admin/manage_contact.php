<?php
session_start();
if (empty($_SESSION['User'])) {
    header('location:http://localhost/travel/index.php?controller=admin&action=login');
} else {
?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Quản Lý Thắc Mắc</title>
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
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/morris.css" type="text/css" />
        <link href="css/font-awesome.css" rel="stylesheet">
        <script src="js/jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/table-style.css" />
        <link rel="stylesheet" type="text/css" href="css/basictable.css" />
        <script type="text/javascript" src="js/jquery.basictable.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#table').basictable();

                $('#table-breakpoint').basictable({
                    breakpoint: 768
                });

                $('#table-swap-axis').basictable({
                    swapAxis: true
                });

                $('#table-force-off').basictable({
                    forceResponsive: false
                });

                $('#table-no-resize').basictable({
                    noResize: true
                });

                $('#table-two-axis').basictable();

                $('#table-max-height').basictable({
                    tableWrapper: true
                });
            });
        </script>
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
        <style>
            .errorWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #dd3d36;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }

            .succWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #5cb85c;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            }

            
        </style>
    </head>

    <body>
        <div class="page-container">
            <!--/content-inner-->
            <div class="left-content">
                <div class="mother-grid-inner">
                    <!--header start here-->
                    <?php include('admin/includes/header.php'); ?>
                    <div class="clearfix"> </div>
                </div>
                <!--heder end here-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Quản lý thắc mắc</li>
                </ol>
                <div class="agile-grids">
                    <div class="agile-tables">
                        <div class="w3l-table-info">
                            <h2>Quản lý thắc mắc</h2>
                            <table id="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ Tên</th>
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th width="35%">Nội Dung </th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <?php
                                $stt = 1;
                                foreach ($contact as $value) {
                                ?>
                                    <tbody>
                                        <tr>
                                            <td ><?php echo $stt; ?></td>
                                            <td ><?php echo $value['Fname']; ?></td>
                                            <td ><?php echo $value['Email']; ?> </td>
                                            <td ><?php echo $value['Mobile']; ?></td>
                                            <td ><?php echo $value['Content']; ?></td>
                                            <td><a href="#" onclick="return confirm('Do you really want to read')">Đọc</a>
                                            </td>

                                        </tr>
                                    </tbody>
                                <?php $stt++;
                                } ?>
                            </table>
                        </div>
                        </table>


                    </div>
                    <!-- script-for sticky-nav -->
                    <script>
                        $(document).ready(function() {
                            var navoffeset = $(".header-main").offset().top;
                            $(window).scroll(function() {
                                var scrollpos = $(window).scrollTop();
                                if (scrollpos >= navoffeset) {
                                    $(".header-main").addClass("fixed");
                                } else {
                                    $(".header-main").removeClass("fixed");
                                }
                            });

                        });
                    </script>
                    <!-- /script-for sticky-nav -->
                    <!--inner block start here-->
                    <div class="inner-block">

                    </div>
                    <!--inner block end here-->
                    <!--copy rights start here-->
                    <?php include('admin/includes/footer.php'); ?>
                    <!--COPY rights end here-->
                </div>
            </div>
            <!--//content-inner-->
            <!--/sidebar-menu-->
            <?php include('admin/includes/sidebarmenu.php'); ?>
            <div class="clearfix"></div>
        </div>
        <script>
            var toggle = true;

            $(".sidebar-icon").click(function() {
                if (toggle) {
                    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                    $("#menu span").css({
                        "position": "absolute"
                    });
                } else {
                    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                    setTimeout(function() {
                        $("#menu span").css({
                            "position": "relative"
                        });
                    }, 400);
                }

                toggle = !toggle;
            });
        </script>
    </body>

    </html>
<?php } ?>