<?php 
    require("database.php");
    $id_cart = $_POST['id'];
    $id_sach = $_POST['idSach'];
    $quantity = $_POST['quantity'];
    $total_price = $_POST['price'];
    $query = "UPDATE chitietgiohang SET soLuong = ".$quantity.", tongTien = ".$total_price." WHERE idGioHang = ".$id_cart." AND idSach = ".$id_sach.";";
    $con->query($query);
    $con->close();
?>