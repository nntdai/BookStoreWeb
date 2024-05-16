<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <!-- Header -->
    <?php   
        require_once("./Model/EntityAccount.php");
        session_start();
        if(isset($_SESSION['user'])){
            $user = $_SESSION["user"];
        }
    require("./homepage_pages/header.php"); ?>
    <?php 
        echo'<h style="font:25px bolder; margin-left: 10%;">GIỎ HÀNG</h>
        <div class="cart_wrapper">
            <div class="product_panel_wrapper">
                <div class="top_panel"> 
                    <p style="left: 2%;"> sản phẩm</p>
                    <p style="left:40%"> đơn giá</p>
                    <p style="left:60%"> số lượng</p>
                    <p style="left:80%"> tổng giá</p>
                </div>
                ';
                $query = "SELECT * FROM giohang WHERE status = 0 AND soDienThoai =".$user->soDienThoai;
                $result_cart = $con->query($query);
                if($result_cart->num_rows > 0){
                    if($cart = $result_cart->fetch_assoc()){
                        $query = "SELECT * FROM chitietgiohang 
                                JOIN sach ON chitietgiohang.idSach = sach.id 
                                WHERE idGioHang = ".$cart["id"];
                                $result_chitiet = $con->query($query);
                                $total_price = 0;
                                while($chitiet = $result_chitiet->fetch_assoc()){
                                    $query = "SELECT * FROM hinhanhsach WHERE idSach =". $chitiet["idSach"];
                                    $result_img = $con->query($query);
                                    $img = $result_img->fetch_assoc();
                                    $total_price += $chitiet["tongTien"];
                                    $img_url = $img["url"];
                                    echo'                
                                    <div class="product_panel">
                                    <img src="',$img_url,'" alt="" id="img">
                                    <div class="name">',$chitiet["ten"],'</div>
                                    <div class="prices">
                                        <p class="newprice">',$chitiet["giagoc"] * (100 - $chitiet["phanTramKhuyenMai"])/100,' đ</p>
                                        <p class="oldprice">',$chitiet["giagoc"],' đ</p>
                                    </div>
                                    <div class="quantity">
                                        <div class="counter">
                                            <div class="counter">
                                            <input type = "number" class="counter-value" value = "',$chitiet["soLuong"],'" min ="0" max = "',$chitiet["soLuongCon"],'"/>
                                        </div>
                                        </div>
                                    </div>
                                    <p class="total">',$chitiet["tongTien"],' đ</p>
                                    <div class="delete" onclick = "itemDelete(',$chitiet["idSach"],')"><img src="./Image/close.png" alt="" id="img" ></div>
                                </div>                            
                            ';
                                }
                    }
                }
                echo'
                </div>
                <div class="purchase_panel">
                <h style="font-weight: bolder; font-size: 22px; margin-left: 10px;">Tổng cộng</h>
                ';
                if(@$total_price > 0){
                    echo'
                    <p id = "cart_total_price">',$total_price,' đ</p>';
                }
                else echo '<p id = "cart_total_price">0 đ</p>';
                echo'
                <button id = "purchase_button">Thanh toán</button>
                </div>
            </div>
            <div id="order_wrapper_cart" class="order_wrapper_cart">
    <div class = "form_wrapper_cart">
        <h>Thông tin khách hàng</h>
        <p>Họ tên: <span id="order_customername">',$user->hoTen,'</span></p>
        <p>Số điện thoại: <span id="order_phonenum">',$user->soDienThoai,'</span></p>
        <p>Email: <span id="order_email">',$user->email,'</span></p>
        <h>Thông tin đơn hàng</h>
        <p>ID Giỏ hàng: <span id="cart_id">',$cart['id'],'</span></p>
        <p>Ngày đặt hàng: <span id="order_date"></span></p>
        <label for="address">Địa chỉ được giao:</label>
        <input type="address" id="address" name="address" placeholder = "Nhập địa chỉ nhận hàng">
    <div class="form-group">
        <button id = "cartSubmit">Mua</button>
    </div>
    <img src="./Image/cross.png" alt="" id="close_img_cart" onclick = "hideOrderPopup()">
    </div>
</div>
';
                $con->close();
    ?>
    <!-- Footer -->
    <?php   require("./homepage_pages/footer.php"); ?>
</body>
<script src="./js/cart.js"></script>
<script src="./js/homepage.js"></script>
<script src="./js/Locvatimkiem.js"></script>
</html>