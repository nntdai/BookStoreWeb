<?php 
    require("database.php");
    $id_sach = $_POST["id"];
    $id_giohang = $_POST['cart_id'];
    $query = "DELETE FROM chitietgiohang WHERE idSach = ". $id_sach." AND idGioHang = ".$id_giohang.";";
    $con->query($query);
    $con->close();
?>