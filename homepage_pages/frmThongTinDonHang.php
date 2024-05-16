<!-- Full screen modal -->
<?php 
    require_once("database.php");
    $user = $_SESSION["user"];
    echo $user->soDienThoai;
?>
<div class="modal" id="thongtindonhang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin đơn hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
        <thead></thead>
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Địa chỉ giao</th>
                <th scope="col">Thành tiền</th>
                <th scope="col">Tình trạng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM giohang WHERE soDienThoai = $user->soDienThoai AND status = 1;";
            $result_giohang = $con->query($query);
            while($giohang = $result_giohang->fetch_assoc()){
                
                $query = "SELECT * FROM donhang WHERE idGioHang = ".$giohang['id'].";";
                $result_donhang = $con->query($query);
                $donhang = $result_donhang->fetch_assoc();
            echo'
            <tr>
                <td>',$donhang['id'],'</td>
                <td>',$donhang['ngayDat'],'</td>
                <td>',$donhang['diaChiGiao'],'</td>
                <td>',$giohang['tongTien'],'</td>
                ';
                if($donhang['idTinhTrang'] == 1){
                    echo'
                    <td>Chưa xử lý</td>
                    ';}
                else{
                    echo'<td>Đã xử lý</td>';
                }
                    echo'
            </tr>';
            }
            ?> 
            <!-- Repeat the above <tr> for each order -->
        </tbody>
    </div>
</div>