<?php
    require("database.php");
    $diaChi = $_POST['address'];
    $sdt = $_POST['sdt'];
    $date = $_POST['date'];
    $method = $_POST['method'];
    if($method == 1){
        $id_sach = $_POST['id'];
        $soluong = $_POST['quantity'];
        $tongTien = $_POST['price'];
    // $diaChi = 'abc';
    // $sdt = '0900111122';
    // $date = '2024-05-15';
        echo $date;
        $query = "SELECT * FROM giohang WHERE soDienThoai = '".$sdt."';";
        $result_giohang = $con->query($query);
        $query = "SELECT * FROM donhang";
        $result_donhang = $con->query($query);
        if($result_donhang->num_rows > 0){
            while(($donhang = $result_donhang->fetch_assoc())){
                $id_donhang = $donhang['id'];
            }
                $id_donhang += 1;
        }
        else {$id_donhang = 1;}
        if($result_giohang->num_rows > 0){
            while(($giohang = $result_giohang->fetch_assoc())){
                $id_giohang = $giohang['id'];
            }
                $id_giohang += 1;
        }
        else {$id_giohang = 1;}
                $query = "INSERT INTO giohang (id, soDienThoai, tongTien, status) VALUES ($id_giohang,'$sdt',$tongTien, 1);";
                $con->query($query);
                $query ="INSERT INTO chitietgiohang (idSach, idGioHang, soLuong, tongTien) VALUES ('$id_sach', $id_giohang, $soluong, $tongTien);";
                $con->query($query);
                $query = "INSERT INTO donhang (id, idGioHang, diaChiGiao, idTinhTrang, ngayDat, ngayHoanThanhDonHang) VALUES ($id_donhang, $id_giohang, '$diaChi', 1,'$date','$date');";
                $con->query($query);
                $con->close();
}
    else {
        $cart_id = $_POST['cart_id'];
        $tongGioHang = $_POST['cart_price'];
        // $query = "SELECT * FROM giohang WHERE id = '".$cart_id."';";
        // $result_giohang = $con->query($query);
        $query = "SELECT * FROM donhang";
        $result_donhang = $con->query($query);
        if($result_donhang->num_rows > 0){
            while(($donhang = $result_donhang->fetch_assoc())){
                $id_donhang = $donhang['id'];
            }
                $id_donhang += 1;
        }
        else {$id_donhang = 1;}
        $query = "UPDATE giohang set tongTien = ".$tongGioHang.", status = 1 WHERE id = ".$cart_id.";";
        $con->query($query);
        $query = "INSERT INTO donhang (id, idGioHang, diaChiGiao, idTinhTrang, ngayDat, ngayHoanThanhDonHang) VALUES ($id_donhang, $cart_id, '$diaChi', 1,'$date','$date');";
        $con->query($query);
        $con->close();
    }
?> 