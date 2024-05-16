<?php
    include_once("C:/xampp/htdocs/AdminBookStore/Controller/Admin/Donhang.php");
    include_once("C:/xampp/htdocs/AdminBookStore/Controller/Admin/chitietgiohang.php");
    $Donhang_Control=new Donhang_list();
    $DonHang=$Donhang_Control->getAllDonhangList();
    $GioHang=$Donhang_Control->getAllGiohangList();
    $tinhtrangdon=$Donhang_Control->getAlltinhtrangdonList();
    if(isset($_GET['madon'])){
        $ma=$_GET['madon'];
        $donhang=$Donhang_Control->getById($ma);
        $madh=$donhang['madon'];
        $ten=$donhang['hoTen'];
        $sdt=$donhang['soDienThoai'];
        $dc=$donhang['diaChiGiao'];
        $order_day=$donhang['ngayDat'];
        $order_done=$donhang['ngayHoanThanhDonHang'];
        $cash=$donhang['tongTien'];
        $ttd=$donhang['matinhtrang'];
        $idgiohang=$donhang['idGioHang'];
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
<div id="khung_hinh_update">
    <form method="POST" id="update_order" action="" onsubmit="return false">
        <div id="khung_update">
            <div style="margin:10px; text-align: center; height:26px">
                <img src="/AdminBookStore/Image/close.png" height="25px" width="25px" style="float:right" onclick="close_update_order()">
            </div>
                <h2 style="margin-bottom:30px">Chi tiết đơn hàng</h2>
            <div class="intro_update">
                <b>Mã đơn hàng :</b>
                <input type="text" id="madonText_update" value="<?php echo "$madh";?>" name="madonText_update" size="50" maxlength="10" class="input" readonly>
            </div>
            <div class="intro_update">
                <b>Tên khách hàng :</b>
                <input type="text" id="NameText_update" value="<?php echo "$ten";?>" name="NameText_update" size="50" maxlength="10" class="input" readonly>
            </div>
            <div class="intro_update">
                <b>Số điện thoại :</b>
                <input type="text" id="PhoneText_update" value="<?php echo "$sdt";?>" name="PhoneText_update" size="50" maxlength="10" class="input" readonly>
            </div>
            <div class="intro_update">
                <b>Địa chỉ giao hàng :</b>
                <input type="text" id="AddressText_update" value="<?php echo "$dc";?>" name="AddressText_update" size="50" class="input" readonly>
                <div id="MailError_update"></div>
            </div>
            <div class="intro_update">
                <b>Ngày đặt :</b>
                <input type="text" id="OrderdayText_update" value="<?php echo "$order_day";?>" name="OrderdayText_update" size="50" class="input" readonly>
            </div>
            <div class="intro_update">
                <b>Ngày hoàn thành :</b>
                <input type="text" id="OrderdoneText_update" value="<?php echo "$order_done";?>" name="OrderdoneText_update" size="50" class="input" readonly>
            </div>
            <div class="intro_update">
                <b>Tổng số tiền :</b>
                <input type="text" id="cashText_update" name="cashText_update" value="<?php echo "$cash";?>" size="50" class="input" readonly>
            </div>
            <div class="intro_update">
                <b>Tình trạng :</b>
                <select id="cbostatus_update" value="<?php echo "$ttd";?>" name="cbostatus_update" class="input">
                    <?php
                        foreach($tinhtrangdon as $stt){
                            if($stt['id']==$ttd){
                                echo "<option value='".$stt["id"]."'selected >".$stt['tenTinhTrang']."</option>";
                            }else{
                                echo "<option value='".$stt["id"]."'>".$stt['tenTinhTrang']."</option>";
                            }
                            
                        }
                    ?>
                </select>
            </div>
                <input type="button" id="remove_update" value="Hủy" onclick="close_update_order()">
                <input type="submit" id="Updatebtn" name="Updatebtn" value="Cập nhật đơn hàng" onclick="send_data_update()">
            </div>
            
        </div>
    </form>
</div>


	<div id="container-listBook">
	<h2>Danh sách đơn hàng</h2>
    <table class="table table-hover">
    <tr class="table-dark">
	    <th scope="col">Mã đơn hàng</th>
        <th scope="col" >Số điện thoại</th>
        <th scope="col">Địa chỉ giao hàng</th>
	    <th scope="col">Thời gian đặt</th>
	    <th scope="col">Thời gian hoàn thành</th>
        <th scope="col">Số tiền</th>
        <th scope="col">Tình trạng đơn hàng</th>
        <th scope="col">Sửa</th>
        
    </tr> 
	<?php
		foreach ($DonHang as $dh){       
        echo "<th>".$dh['madon']."</th>";
        echo "<th>".$dh['soDienThoai']."</th>";
        echo "<th>".$dh['diaChiGiao']."</th>";
        echo "<th>".$dh['ngayDat']."</th>";
        echo "<th>".$dh['ngayHoanThanhDonHang']."</th>";
        echo "<th>".$dh['tongTien']."</th>";
        echo "<th>".$dh['tenTinhTrang']."</th>";
		echo '<th>		
			<a href="index.php?controller=order&madon='.$dh['madon'].'">
				<ion-icon name="create-outline"></ion-icon>
			</a>
			</th>
			<th>	
			
				</th>';
	  	echo "<tr/>";
        //   $message="Hello";
        //   echo "<script>alert('$message');</script>";
	    }
        if(isset($_GET['madon'])){
            echo '<script>var data=document.getElementById("khung_hinh_update")
            data.style.display="block"</script>';
        }
	?>
	<br>
</div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
<!-- <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> -->
</html>