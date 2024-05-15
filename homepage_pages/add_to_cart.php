<?php 
    require("database.php");
    $id_sach = $_POST['id'];
    $soluong = $_POST['quantity'];
    $tongTien = $_POST['price'];
    // $id_sach = 8935235226272;
    // $soluong = 10;
    // $tongTien = 200;
    $query = "SELECT * FROM giohang WHERE status = 0 ;";
    $result_giohang = $con->query(($query));
    if($result_giohang->num_rows > 0){
        if($giohang = $result_giohang->fetch_assoc()){
            $id_giohang = $giohang["id"];
            $query = "SELECT * FROM chitietgiohang WHERE idSach = ". $id_sach . " AND idGioHang = ". $id_giohang .";";
            $result_chitiet = $con->query($query);
            if($result_chitiet->num_rows > 0){
                $chitiet = $result_chitiet->fetch_assoc();
                $query = "SELECT * FROM sach WHERE id = ".$id_sach;
                $result_sach = $con->query($query);
                $sach = $result_sach->fetch_assoc();
                if ($sach["soLuongCon"] >= ($chitiet["soLuong"] + $soluong)){
                    $query = "
                    UPDATE chitietgiohang SET soLuong = ".($chitiet["soLuong"] + $soluong).
                    ", tongTien = ".($chitiet["soLuong"] + $soluong) * ($sach["giagoc"] * 
                    (100 - $sach["phanTramKhuyenMai"])/100 )."
                    WHERE idSach = '". $id_sach . "' AND idGioHang = ". $id_giohang .
                    ";";
                    $con->query($query);
                }
                else echo "Số lượng không đủ ";
        }   else{
                $query = "INSERT INTO chitietgiohang (idSach, idGioHang, soLuong, tongTien) VALUES ('$id_sach', $id_giohang, $soluong, $tongTien);";
                $con->query($query);
        }
    }}
    $result_giohang->free_result();
    $con->close();
?>