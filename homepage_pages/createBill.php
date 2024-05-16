<?php
    require("database.php");
    $diaChi = $_POST['address'];
    $sdt = $_POST['sdt'];
    $date = $_POST['date'];
    $id_cart = $_POST['id'];
    $tongTien = $_POST['cart_price'];
    $query = "SELECT * FROM donhang ";
    $result_donhang = $con->query($query);
    if($result_donhang->num_rows > 0){
        while(($donhang = $result_donhang->fetch_assoc())){
            $id_donhang = $donhang['id'];
        }
        $id_donhang += 1;
    }
    else    {$id_donhang = 1;}
    $query = "INSERT INTO donhang (id, idGioHang, diaChiGiao, idTinhTrang, ngayDat, ngayHoanThanhDonHang) VALUES ($id_donhang,$id_cart,'$diaChi', 1, '$date', '$date' )";
    $con->query($query);
    $query = "UPDATE giohang SET status = 1, tongTien = $tongTien WHERE id = $id_cart;";
    $con->query($query);
    $query = "SELECT * FROM chitietgiohang WHERE idGioHang = $id_cart;";
    $result_chitiet = $con->query($query);
    while($chitiet = $result_chitiet->fetch_assoc()){
        $query = "SELECT * FROM sach WHERE id = ".$chitiet['idSach'].";";
        $sach = $con->query($query)->fetch_assoc();
        $query = "UPDATE sach SET soLuongCon = ".$sach['soLuongCon'] - $chitiet['soLuong'].", soLuongDaBan = ".$sach['soLuongDaBan'] + $chitiet['soLuong']." WHERE id =".$chitiet['idSach'].";";
        $con->query($query);
    }
    $con->close();
?> 