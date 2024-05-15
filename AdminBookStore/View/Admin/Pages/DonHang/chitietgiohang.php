<?php
    include_once("C:/xampp/htdocs/AdminBookStore/Controller/Admin/Donhang.php");
    include_once("C:/xampp/htdocs/AdminBookStore/Controller/Admin/chitietgiohang.php");
    $Donhang_Control=new Donhang_list();
    $DonHang=$Donhang_Control->getAllDonhangList();
    $chitietgio_Control=new CTGiohang_list();
    if(isset($_GET['chitiet'])){
        $ma=$_GET['chitiet'];
        $chitietgio=$chitietgio_Control->getById($ma);
    }
?>
<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<html>

<head>
	<link rel="stylesheet" href="/AdminBookStore/Public/Admin/Pages/Home/donhang.css">
    <script src="/AdminBookStore/Public/Admin/Pages/Home/js/DonHang/DonHang.js"></script>
	<meta charset="UTF-8"/>
	<title>list</title>
</head>
<body>
    <div id="khung_hinh_chitietgiohang">
        <div id="khung_chitietgiohang">
            <div style="margin:10px; text-align: center; height:26px">
                <img src="/AdminBookStore/Image/close.png" height="25px" width="25px" style="float:right" onclick="close_Detail(<?php echo $ma;?>)">
            </div>
                <h2 style="margin-bottom:30px">Chi tiết giỏ hàng</h2>
                <table class="table table-hover" id="detail">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Tên sách</th>
            <th scope="col">Thể loại</th>
            <th scope="col">Tác giả</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tổng tiền</th>
        </tr> 
        <?php
            $i=1;
            foreach ($chitietgio as $dh){       
                echo "<th>".$i."</th>";
                echo "<th><img src='/AdminBookStore/".$dh['url']."' width=100px height=100px'></th>";
                echo "<th>".$dh['ten']."</th>";
                echo "<th>".$dh['tenTheLoai']."</th>";
                echo "<th>".$dh['hoTen']."</th>";
                echo "<th>".$dh['soLuong']."</th>";
                echo "<th>".$dh['tongTien']."</th>";
                echo "<tr/>";
                    //   $message="Hello";
                    //   echo "<script>alert('$message');</script>";
                $i++;
            }
        ?>
        <br>
    </div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
<!-- <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> -->
</html>