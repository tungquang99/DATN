<!DOCTYPE HTML>
<html>

<head>
    <title>Câp Nhật Tour</title>
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
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Câp Nhật Tour</li>
            </ol>
            <!--grid-->
            <div class="grid-form">

                <!---->
                <div class="grid-form1">
                    <h3>Câp Nhật Tour</h3>
                    <?php
                    if (isset($success) && in_array('update_success', $success)) {
                        echo "<p style='color: green; text-align: center;'>Cập nhật thành công</p>";
                    }
                    ?>
                    <div class="tab-content">
                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Tên tour</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="Tour" id="packagetype" placeholder=" Tên Tour" value="<?php echo $data['Name_tour'] ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Thành Phố</label>
                                    <div class="col-sm-5">
                                        <select name="destination" id="destination" class="form-control1">
                                        <option value="<?php echo $data['id_destination']; ?>"><?php echo $data['Name_city']; ?></option>
                                            <?php
                                            foreach ($data_des as $value) {
                                            ?>
                                                <option value="<?php echo $value['id_destination']; ?>"><?php echo $value['Name_city']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Loại Hình Du Lịch</label>
                                    <div class="col-sm-5">
                                        <select name="activities" id="activities" class="form-control1">
                                        <option value="<?php echo $data['id_activities']; ?>"><?php echo $data['Name_LH']; ?></option>
                                            <?php
                                            foreach ($data_act as $value) {
                                            ?>
                                                <option value="<?php echo $value['id_activities']; ?>"><?php echo $value['Name_LH']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Khởi hành</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control1" name="startDate" id="packageprice" placeholder="Khởi hành" value="<?php echo $data['startDate'] ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Thời gian</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="Timetour" id="packageprice" placeholder="Thời Gian" value="<?php echo $data['time_tour'] ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Giá</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="Price" id="packageprice" placeholder=" Nhập giá tiền" value="<?php echo $data['Price'] ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Giảm Giá</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="Sale" id="packageprice" placeholder=" Nhập giảm giá" value="<?php echo $data['Sale'] ?>">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Giới thiệu</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="Content" id="packagefeatures" placeholder="" required value="<?php echo $data['Content'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Chương trình tour</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control ckeditor" rows="10" cols="50" name="Details" id="packagedetails" required>
                                            <?php echo $data['CtTour'] ?>
                                            </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Hình ảnh</label>
                                    <div class="col-sm-4">
                                    <img src="admin/Tour_img/<?php echo $data['Img'] ?>" alt="" width="100px" height="100px";>
                                    <img src="admin/Tour_img/<?php echo $data['Img1'] ?>" alt="" width="100px" height="100px";>
                                    <img src="admin/Tour_img/<?php echo $data['Img2'] ?>" alt="" width="100px" height="100px";>
                                    <img src="admin/Tour_img/<?php echo $data['Img3'] ?>" alt="" width="100px" height="100px";>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" name="Picture" id="packageimage" >
                                        <input type="file" name="Picture1" id="packageimage" >
                                        <input type="file" name="Picture2" id="packageimage" >
                                        <input type="file" name="Picture3" id="packageimage" >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <button type="submit" name="update_tour" class="btn-primary btn">Cập Nhật tour</button>
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