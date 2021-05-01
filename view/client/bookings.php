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
                        <a href="" class="nav-link">Liên Hệ Đặt Tour</a>
                    </li>
                </ul>
            </div>
        </div>
        </header>
        <!--BODY-->
        <div class="fluid-container contact booking">
            <h1>THÔNG TIN ĐẶT TOUR</h1>
            <p>Nhập liên hệ và tin nhắn của bạn cho chúng tôi</p>
            <form action="" method="POST" class="form container">
                <?php
                if (isset($success_book) && in_array('success_book', $success_book)) {
                    echo "<p style='color: green; text-align: center;'>Đặt vé thành công</p>";
                }
                ?>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-5">
                        <div class="info info_tour">
                            <h2><span class="stt">1</span>Thông Tin Tour</h2>
                            <img src="admin/Tour_img/<?php echo $ctTour['Img']; ?>" alt="">
                            <h3><?php echo $ctTour['Name_tour']; ?></h3>
                            <span class="price_tour">Giá:<span class="price"> <?php echo $ctTour['Price']; ?> </span>VNĐ/ người
                                <input type="number" name="person" max="10" value="1" min="1" class="cart-quantity-input" required>
                            </span>
                            <div class="total_sum">Tổng Tiền:
                                <input type="text" id='total' name="total" class="cart-total-price" value="<?php echo $ctTour['Price']; ?>">VNĐ
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-7 col-lg-4 mt-5">
                        <div class="info info_user" id="info">
                            <h2><span class="stt">2</span>Thông Tin Liên Hệ</h2>
                            <label for="">Họ Tên:</label>
                            <input type="text" name="fname" id="fname" placeholder="Họ và tên" required>
                            <label for="">Số Điện Thoại:</label>
                            <input type="tel" maxlength="10" minlength="10" name="mobile" id="mobile" placeholder="Số điện thoại" pattern="[086/096/097/098/032/033/034/035/036/037/038/039]{3}[0-9]{4}[0-9]{3}" required />
                            <span class="error"></span>
                            <label for="">Email:</label>
                            <input type="email" name="email" id="email" placeholder="Email" pattern="^[a-z0-9._%+-]+@[gmail]+\.[com]{2,4}$" required>
                            <label for="">Địa Chỉ:</label>
                            <input type="text" name="address" id="address" placeholder="Địa chỉ" required>
                            <label for="">Ngày Khởi Hành: </label>
                            <input type="date" name="datetour" id="datetour" placeholder="Chọn ngày đi" required>
                            <button type="submit" class="btn btn_book" name="bookings">Gửi đi</button>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 mt-5">
                        <div class="info thanhtoan">
                            <h2><span class="stt">3</span>Thanh Toán</h2>
                            <h4>Lưu ý:</h4>
                            <ul>
                                <li>Quý khách có thể thanh toán bằng thẻ <a href="http://localhost/travel/client.php?controller=client&action=pay">tại đây</a></li>
                                <li>Travel Three sẽ liên hệ với khách hàng trong <strong>15 phút</strong> (qua gmail hoặc số điện thoại) để xác nhận tour và thời hạn thanh toán</li>
                                <li>Quý khách có thể thanh toán(tại nhà, tại Travel Three, chuyển khoản)</li>
                                <li>Quý khách muốn hủy tour vui lòng liên hệ trước theo Hotline: <strong>099333666888</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">

                    </div>

                </div>
            </form>
        </div>
        <a href="#" class="topTop">
            <i class="fas fa-chevron-up"></i>
        </a>
        <!--FOOTER-->
        <?php include('assets/includes/footer.php'); ?>
    </div>
    <script>
        document.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', function(e) {
            var input = event.target
            if (isNaN(input.value) || input.value <= 0) {
                input.value = 1;
            }
            updatecart()
        });

        function updatecart() {
            var total = 0
            var price_item = document.querySelector(".price")
            var quantity_item = document.getElementsByClassName("cart-quantity-input")[0]
            var price = parseFloat(price_item.innerHTML) // chuyển một chuổi string sang number để tính tổng tiền.
            console.log(price);
            var quantity = quantity_item.value // lấy giá trị trong thẻ input
            total = total + (price * quantity)
            console.log(total);
            $(".cart-total-price")[0].value = total + '.000';

        }
    </script>
</body>

</html>