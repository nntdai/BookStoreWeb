<?php 
    require("database.php");
    $id_sach = $_POST['id'];
    $phonenum = $_POST['phonenum'];
    $price = $_POST['price'];
    $query = "SELECT * FROM sach WHERE id = $id_sach;";
    $sach = $con->query($query)->fetch_assoc();
    if($sach['soLuongCon'] <= 0)
        exit("Không đủ số lượng");
    $query = "SELECT * FROM giohang WHERE status = 0 AND soDienThoai = '".$phonenum."';";
    $result_giohang = $con->query(($query));
    if($result_giohang->num_rows > 0){
        if($giohang = $result_giohang->fetch_assoc()){
            $id_giohang = $giohang["id"];
            $query = "SELECT * FROM chitietgiohang WHERE idSach = ". $id_sach . " AND idGioHang = ". $id_giohang .";";
            $result_chitiet = $con->query($query);
            if($result_chitiet->num_rows > 0){
                // $chitiet = $result_chitiet->fetch_assoc();
                // $query = "SELECT * FROM sach WHERE id = ".$id_sach;
                // $result_sach = $con->query($query);
                // $sach = $result_sach->fetch_assoc();
                // if ($sach["soLuongCon"] >= ($chitiet["soLuong"] + $soluong)){
                //     $query = "
                //     UPDATE chitietgiohang SET soLuong = ".($chitiet["soLuong"] + $soluong).
                //     ", tongTien = ".($chitiet["soLuong"] + $soluong) * ($sach["giagoc"] * 
                //     (100 - $sach["phanTramKhuyenMai"])/100 )."
                //     WHERE idSach = '". $id_sach . "' AND idGioHang = ". $id_giohang .
                //     ";";
                //     $con->query($query);
                echo "Đã có sản phẩm trong giỏ hàng";
                }
                else {
                $query = "INSERT INTO chitietgiohang (idSach, idGioHang, soLuong, tongTien) VALUES ('$id_sach', $id_giohang, 1, $price);";
                $con->query($query);
                echo "Đã thêm sản phẩm vào giỏ hàng";
            }
        }
        }   else{
                $query = "SELECT * FROM giohang";
                $result_giohang = $con->query($query);
                $id_giohang = 0;
                if($result_giohang->num_rows > 0){
                    while($giohang = $result_giohang->fetch_assoc()){
                        $id_giohang = $giohang['id'];
                    }
                }
                $query = "INSERT INtO giohang (id, soDienThoai, tongTien, status) VALUES ($id_giohang+1, '$phonenum', 0, 0)";
                $con->query($query);
                $query = "INSERT INTO chitietgiohang (idSach, idGioHang, soLuong, tongTien) VALUES ('$id_sach', $id_giohang + 1, 1, $price);";
                $con->query($query);
                echo "Đã thêm sản phẩm vào giỏ hàng mới";
        }
    $result_giohang->free_result();
    $con->close();
?>