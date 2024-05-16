<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/thongtinSP.css">
    <link rel="stylesheet" href="./css/homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
    require_once("./Model/EntityAccount.php");
    session_start();
    if(isset($_SESSION['user'])){
        $user = $_SESSION["user"];
    }
    require("./homepage_pages/header.php");
    $idSach = $_GET['id'];
        $query_product = "SELECT *, sach.ten AS ten_sach, sach.id AS id_sach FROM sach JOIN nhaxuatban ON sach.idNXB = nhaxuatban.id 
                JOIN tacgia_sach ON sach.id = tacgia_sach.idSach 
                JOIN tacgia ON tacgia_sach.idTacGia = tacgia.id
                JOIN hinhthuc ON sach.idHinhThuc = hinhthuc.id
                WHERE sach.id =".$idSach;
        $result_product = $con->query($query_product);
        if ($result_product->num_rows > 0)  
        { 
            if($row = $result_product->fetch_assoc()) 
            {
                $query_img = "SELECT url FROM hinhanhsach WHERE idsach =".$idSach;
                $result_img = $con->query($query_img);
                echo '
    <div class="detail_wrapper">
    <div class="product_detail" id = ',$row["id_sach"],'>
            <div class="image_detail">
                <div class="side_image_detail">
                ';
                $i = 0;
                while($img_row = $result_img->fetch_row()){
                    //echo'<img src="',$img_row[0],'" alt="" id="img_detail">';
                    $img_array[$i] = $img_row[0]; 
                    $i += 1;
                }
                $result_img -> free_result();
                echo'
                    <img src="',$img_array[1],'" alt="" id="img_detail">
                    <img src="',$img_array[2],'" alt="" id="img_detail">
                    <img src="',$img_array[3],'" alt="" id="img_detail">
                </div>
                <div class="main_image_detail">
                    <img src="',$img_array[0],'" alt="" id="img_detail">
                </div>
            </div>
            <div class="discount_detail">
                ',$row["phanTramKhuyenMai"],'%
            </div>
            <div class="right_content_detail">
                <div class="name_detail">
                    <h1>',$row["ten_sach"],'</h1>
                </div>
                <div class="product_info_detail">
                    <div class="flex_item_detail">
                        <p>Nhà xuất bản: ',$row["tenNXB"],'</p>
                        <p>Còn hàng: <span style="color:blue;">',$row["soLuongCon"],' sản phẩm</span></p>
                    </div>
                    <div class="flex_item_detail">
                        <p>Tác giả: ',$row["hoTen"],'</p>
                        <p>Hình thức bìa: ',$row["ten"],'</p>
                    </div>
                </div>
                <div class="prices_detail">
                    <p class="newprice_detail">',$row["giagoc"] * (100 - $row["phanTramKhuyenMai"])/100,' đ</p>
                    <p class="oldprice_detail">',$row["giagoc"],' đ</p>
                </div>
                <div class="quantity_detail">
                    <div style="width: 85px; font-weight: bolder;">Số lượng </div>
                    <div class="counter_detail">
                        <input type = "number" class="counter-value_detail" value = "0" min ="0" max = "',$row["soLuongCon"],'"/>
                    </div>
                </div>
                <div class="purchase_buttons_detail">
                    <button id="addtoCart_btn">
                        Thêm vào giỏ hàng
                    </button>
                    <button id="purchase_btn"> Mua ngay</button>
                </div>
            </div>
        </div>
        <div class="detail">
            <div class="tab_detail">
                <button id="info_btn" class="tablinks" onclick="viewTabs(event,\'overall_info\')">Thông tin sản phẩm</button>
                <button id="des_btn" class="tablinks" onclick="viewTabs(event,\'description\')">Mô tả</button>
            </div>
            <div id="overall_info" class="detailed_information">
                <div class="flex_detail">
                    <p>Mã hàng</p>
                    <p>Tác giả</p>
                    <p>Dịch giả</p>
                    <p>Nhà xuất bản</p>
                    <p>Năm xuất bản</p>
                    <p>Trọng lượng(gr)</p>
                    <p>Kích thước bao bì</p>
                    <p>Số trang</p>
                    <p>Hình thức</p>
                </div>
                <div class="flex_detail">
                    <p>',$row["id_sach"],'</p>
                    <p>',$row["hoTen"],'</p>
                    <p>',$row["tenNguoiDich"],'</p>
                    <p>',$row["tenNXB"],'</p>
                    <p>',$row["namXB"],'</p>
                    <p>',$row["trongLuong"],'</p>
                    <p>',$row["kichThuocBaoBi"],'</p>
                    <p>',$row["soTrang"],'</p>
                    <p>',$row["ten"],'</p>    
                </div>
            </div>
            <div id="description" class="detailed_information">
                <p> ',$row["moTa"],' </p>
            </div>
        </div>
        <div class="recommendation_detail">
            <h>Sách cùng loại</h>
            <div class="recommending_books_detail">
            ';
            $query_genre = 'SELECT * FROM sach WHERE idTheLoai ='.$row["idTheLoai"].' AND id != '.$row["id_sach"];
            $result_genre = $con->query($query_genre);
            while($genre = $result_genre->fetch_assoc()){
                $query_genre_img = "SELECT url FROM hinhanhsach JOIN sach ON sach.id = hinhanhsach.idSach WHERE sach.id =".$genre["id"];
                $result_genre_img = $con->query($query_genre_img);
                $genre_img = $result_genre_img ->fetch_row();
                $img_url = "../".$genre_img[0];
                echo'<div class="recommending_item_detail" onclick = "clickedDetail(',$genre["id"],')"">
                <div class="rec_discount">',$genre["phanTramKhuyenMai"],'%</div>
                <img src="'.$genre_img[0].'" alt="">
                <p style="font-size: 18px;">',$genre["ten"],'</p>
                <p style="color: #9E0D0D; font: 18px bolder;">',$genre["giagoc"] * (100 - $row["phanTramKhuyenMai"])/100,' đ</p>
                <p style="font: 14px; color: #0C92D1; text-decoration: line-through;">',$genre["giagoc"],' đ</p>
                <p style="font-size: 15px;">Còn lại: ',$genre["soLuongCon"],' sản phẩm</p>
            </div>';
            }
            $result_genre_img->free_result();
            echo
            '
                <button onclick = "prevSlide()" class="prev_button_detail"><img style="height: 15px; width: 15px;" src="./Image/angle-left.png" alt=""></button>
                <button onclick = "nextSlide()" class="next_button_detail"><img style="height: 15px; width: 15px;" src="./Image/angle-right.png" alt=""></button>
            </div>
        </div>
    </div>
    ';
    echo
    '
    <div id="order_wrapper" class="order_wrapper">
    <div class = "form_wrapper">
        <h>Thông tin khách hàng</h>
        <p>Họ tên: <span id="order_customername">',$user->hoTen,'</span></p>
        <p>Số điện thoại: <span id="order_phonenum">',$user->soDienThoai,'</span></p>
        <p>Email: <span id="order_email">',$user->email,'</span></p>
        <h>Thông tin đơn hàng</h>
        <p>Tổng số tiền: <span id="order_price"></span> </p>
        <p>Ngày đặt hàng: <span id="order_date"></span></p>
        <label for="address">Địa chỉ được giao:</label>
        <input type="address" id="address" name="address" placeholder = "Nhập địa chỉ nhận hàng">
    <div class="form-group">
        <button id = "orderSubmit">Mua</button>
    </div>
    <img src="./Image/cross.png" alt="" id="close_img" onclick = "hideOrderPopup()">
    </div>
</div>
    ';
            } 
        }  
        else { 
            echo "0 results"; 
        } 
    
       $con->close();
?>
    <?php require("./homepage_pages/footer.php"); ?> 
</body>
<script src="./js/thongtinSP.js"></script>
<script src="./js/homepage.js"></script>
<script src="./js/Locvatimkiem.js"></script>
</html>