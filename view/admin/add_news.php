<?php
session_start();
if (empty($_SESSION['User'])) {
    header('location:http://localhost/travel/index.php?controller=admin&action=login');
} else {
?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Thêm Tour</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript">
            addEventListener("load", function() {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
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
                    <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Tạo Bài Viết</li>
                </ol>
                <!--grid-->
                <div class="grid-form">

                    <!---->
                    <div class="grid-form1">
                        <h3>Tạo Bài Viết</h3>
                        <?php
                        if (isset($success) && in_array('success', $success)) {
                            echo "<p style='color: green; text-align: center;'>Thêm thành công</p>";
                        }
                        ?>
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">
                                <form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Tiêu đề</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="Title" id="packagetype" placeholder=" Tiêu đề" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Nội dung</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control ckeditor" name="Details" id="summernote" rows="10" cols="50"  placeholder="Nội Dung" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Thời gian</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control1" name="Timenews" id="Timenews" placeholder="Thời Gian" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Tác giả</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="author" id="author" placeholder="Tác giả" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Hình ảnh</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="Picture" id="packageimage" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" name="add_news" class="btn-primary btn">Thêm Bài Viết</button>
                                            <button type="reset" class="btn-inverse btn">Đặt lại</button>
                                        </div>
                                    </div>
                            </div>

                            </form>
                            <div class="panel-footer">

                            </div>
                            </form>
                        </div>
                    </div>
                    <!--//grid-->

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