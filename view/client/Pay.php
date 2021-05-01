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
            <h1>Thanh Toán Ngân Hàng</h1>
            <form action="" method="POST" class="form container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="info info_user" id="info">
                            <h2>Thông Tin </h2>
                            <label for="">TP Bank</label>
                            <input type="text" value="21654652163546" disabled>
                            <label for="">BIDV</label>
                            <input type="text" value="98756324654656" disabled>
                            <label for="">VC Bank</label>
                            <input type="text" value="65462132465465" disabled>
                        </div>
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