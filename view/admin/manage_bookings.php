<?php
session_start();
if (empty($_SESSION['User'])) {
    header('location:http://localhost/travel/index.php?controller=admin&action=login');
} else {
?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Quản Lý Đặt Tour</title>
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

            .status a {
                color: #000 !important;
            }

            .dropdown-menu {
                min-width: 80px !important;
            }

            .dropdown-menu li a {
                color: #fff !important;
            }

            .btn-status {
                width: 100%;
                border: none;
                outline: none;
            }

            .btn-red {
                background-color: #dd3d36;
            }

            .orange .btn_warning {
                background-color: orange !important;
                box-shadow: none;
                border: 0px solid #fff;
                border-radius: 5px;
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
                    <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Quản lý đặt
                        tour</li>
                </ol>
                <div class="agile-grids">
                    <!-- tables -->
                    <div class="agile-tables">
                        <div class="w3l-table-info">
                            <h2>Quản lý đặt tour</h2>
                            <table id="table">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Mã Tour</th>
                                        <th>Họ Tên</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Email</th>
                                        <th>Địa Chỉ</th>
                                        <th>Ngày Đi</th>
                                        <th>Sô Người</th>
                                        <th>Tổng Tiền</th>
                                        <th>Trạng Thái</th>
                                    </tr>
                                </thead>
                                <?php $stt = 1;
                                foreach ($data as $value) { ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $stt; ?></>
                                            <td><?php echo $value['Code']; ?></>
                                            <td><?php echo $value['Fname']; ?></td>
                                            <td><?php echo $value['Mobile']; ?></td>
                                            <td><?php echo $value['Email']; ?></td>
                                            <td><?php echo $value['Addr']; ?></td>
                                            <td><?php echo $value['Date_tour']; ?></td>
                                            <td><?php echo $value['Person']; ?></td>
                                            <td><?php echo $value['Total']; ?> </td>
                                            <td class="status">
                                                <div class="dropdown">
                                                    <button class="btn_success btn_wait btn_warning" type="button" data-toggle="dropdown">
                                                        <span class="status_text text-white"><?php echo $value['Pending']; ?></span>
                                                    </button>
                                                    <ul class="dropdown-menu text-dark">
                                                        <li>
                                                            <button type="submit" class="btn-status btn-warning"><a href="http://localhost/travel/index.php?controller=admin&action=check_bks_1&id=<?php echo $value['id_bks'] ?>">Đặt Cọc 30%</a></li></button>
                                                        <li>
                                                            <button type="submit" class="btn-status btn-success"><a href="http://localhost/travel/index.php?controller=admin&action=check_bks&id=<?php echo $value['id_bks'] ?>">Đã Thanh Toán</a></li></button>
                                                        <li>
                                                            <button class="btn-status btn-red"><a href="http://localhost/travel/index.php?controller=admin&action=delete_bks&id=<?php echo $value['id_bks'] ?>">Hủy Tour</a></li></button>
                                                    </ul>
                                                </div>
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
                            $('.status').each(function() {
                                if ($(this).find('.status_text').text() == "Đã Thanh Toán") {
                                    $(this).addClass("disabled");
                                }
                                if ($(this).find('.status_text').text() == "Cọc 30% Giá") {
                                    $(this).addClass("orange");
                                }
                            })

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