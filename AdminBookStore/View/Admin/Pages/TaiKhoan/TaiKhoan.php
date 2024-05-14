<?php
    include_once("C:/xampp/htdocs/AdminBookStore/Controller/Admin/listTaiKhoan.php");
    $TaiKhoan_Model=new TaiKhoanModel();
    $TaiKhoan=$TaiKhoan_Model->get_all();
    $ChucVu_Model=new ChucVuModel();
    $ChucVu=$ChucVu_Model->ChucVuList();
    if(isset($_GET['Phone'])){
        $Phone=$_GET['Phone'];
        $TaiKhoan_update=$TaiKhoan_Model->getByPhone($Phone);
        $phone=$TaiKhoan_update['soDienThoai'];
        $name=$TaiKhoan_update['hoTen'];
        $mail=$TaiKhoan_update['email'];
        $pw=$TaiKhoan_update['matKhau'];
        $id_cv=$TaiKhoan_update['idChucVu'];
    }
    if(isset($_GET['PhoneDelete'])){
        $Phoneremove=$_GET['PhoneDelete'];
    }
?>
<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<html>
<head>
	<link rel="stylesheet" href="Public/Admin/Pages/Home/TaiKhoan.css">
    <script src="Public/Admin/Pages/Home/js/TaiKhoan/TaiKhoan.js"></script>
	<meta charset="UTF-8"/>
	<title>Tài khoản</title>
</head>
<body>
    <div id="khung_hinh">
    <form method="POST" id="add_account" action="" onsubmit="return false">
        <div id="khung">
            <div style="margin:10px; text-align: center; height:26px">
                <img src="/AdminBookStore/Image/close.png" height="25px" width="25px" style="float:right" onclick="close_add_account()">
            </div>
                <h2 style="margin-bottom:30px">Thêm tài khoản</h2>
            <div class="intro">
                <b>Số điện thoại :</b>
                <input type="text" id="PhoneText" name="PhoneText" size="50" maxlength="10" class="input" onblur="checkPhone()">
                <div id="PhoneError"></div>
            </div>
            <div class="intro">
                <b>Email :</b>
                <input type="text" id="MailText" name="MailText" size="50" class="input" onblur="checkMail()">
                <div id="MailError"></div>
            </div>
            <div class="intro">
                <b>Họ và tên :</b>
                <input type="text" id="NameText" name="NameText" size="50" class="input" onblur="checkName()">
                <div id="NameError"></div>
            </div>
            <div class="intro">
                <b>Mật khẩu :</b>
                <input type="password" id="PassText" name="PassText" size="50" class="input" onblur="checkPass()">
                <div id="PassError"></div>
            </div>
            <div class="intro">
                <b>Nhập lại mật khẩu :</b>
                <input type="password" id="PassAgainText" name="PassAgainText" size="50" class="input" onblur="checkPassAgain()">
                <div id="PassAgainError"></div>
            </div>
            <div class="intro">
                <b>Chức vụ :</b>
                <select id="cboChucVu" name="cboChucVu" class="input" onblur="checkName()">
                    <option value=''>Chọn</option>
                    <?php
                        foreach($ChucVu as $cv){
                            echo "<option value='".$cv["id"]."'>".$cv['ten']."</option>";
                        }
                    ?>
                </select>
                <div id="CBError"></div> 
            </div>
            <div>
                <input type="button" id="remove_add" value="Xóa trắng">
                <input type="submit" id="Addbtn" name="Addbtn" value="Thêm tài khoản" onclick="send_data()">
            </div>
            
        </div>
    </form>
    </div>
    <div id="khung_hinh_update">
    <form method="POST" id="update_account" action="" onsubmit="return false">
        <div id="khung_update">
            <div style="margin:10px; text-align: center; height:26px">
                <img src="/AdminBookStore/Image/close.png" height="25px" width="25px" style="float:right" onclick="close_update_account()">
            </div>
                <h2 style="margin-bottom:30px">Cập nhật tài khoản</h2>
            <div class="intro_update">
                <b>Số điện thoại :</b>
                <input type="text" id="PhoneText_update" value="<?php echo "$phone";?>" name="PhoneText_update" size="50" maxlength="10" class="input" readonly>
                <div id="PhoneError_update"></div>
            </div>
            <div class="intro_update">
                <b>Email :</b>
                <input type="text" id="MailText_update" value="<?php echo "$mail";?>" name="MailText_update" size="50" class="input" onblur="checkMail_update()">
                <div id="MailError_update"></div>
            </div>
            <div class="intro_update">
                <b>Họ và tên :</b>
                <input type="text" id="NameText_update" value="<?php echo "$name";?>" name="NameText_update" size="50" class="input" onblur="checkName_update()">
                <div id="NameError_update"></div>
            </div>
            <div class="intro_update">
                <b>Mật khẩu :</b>
                <input type="password" id="PassText_update" value="<?php echo "$pw";?>" name="PassText_update" size="50" class="input" onblur="checkPass_update()">
                <div id="PassError_update"></div>
            </div>
            <div class="intro_update">
                <b>Nhập lại mật khẩu :</b>
                <input type="password" id="PassAgainText_update" name="PassAgainText_update" value="<?php echo "$pw";?>" size="50" class="input" onblur="checkPassAgain_update()">
                <div id="PassAgainError_update"></div>
            </div>
            <div class="intro_update">
                <b>Chức vụ :</b>
                <select id="cboChucVu_update" value="<?php echo "$id_cv";?>" name="cboChucVu_update" class="input" onblur="checkName_update()">
                    <option value=''>Chọn</option>
                    <?php
                        foreach($ChucVu as $cv){
                            if($cv['id']==$id_cv){
                                echo "<option value='".$cv["id"]."'selected >".$cv['ten']."</option>";
                            }else{
                                echo "<option value='".$cv["id"]."'>".$cv['ten']."</option>";
                            }
                            
                        }
                    ?>
                </select>
                <div id="CBError_update"></div> 
            </div>
            <div>
                <input type="button" id="remove_update" value="Xóa trắng">
                <input type="submit" id="Updatebtn" name="Updatebtn" value="Cập nhật tài khoản" onclick="send_data_update()">
            </div>
            
        </div>
    </form>
    </div>
    <div id="khung_hinh_remove">
    <form method="POST" id="remove_account" action="" onsubmit="return false">
        <div id="khung_remove">
            <div style="margin:10px; text-align: center; height:26px">
                <img src="/AdminBookStore/Image/close.png" height="25px" width="25px" style="float:right" onclick="close_remove_account()">
            </div>
                <h2 style="margin-bottom:30px">Xóa tài khoản</h2>
            <div class="intro_remove">
                <b>Bạn có chắc muốn xóa tài khoản :</b>
                <input type="text" id="PhoneText_remove" value="<?php echo "$Phoneremove";?>" name="PhoneText_remove" size="50" maxlength="10" class="input_remove" readonly>

            </div>
            <div>
                <input type="button" id="remove_cancel" value="Hủy" onclick="close_remove_account()">
                <input type="submit" id="remove_btn" name="Delete_btn" value="Xóa tài khoản" onclick="remove()">
            </div>
        </div>
    </form>
    </div>
	<div id="container">
        <div style="height: 55px">
            <input type="button" value="Thêm tài khoản" onclick="open_add_account()" style="float:right; margin-top:5px; margin-bottom: 10px; height: 40px; color: white; background-color:dodgerblue; border-color:dodgerblue; width:200px; border-radius:5px">
        </div>
	<h3 style="text-align:left; margin-left:10px">Danh sách tài khoản</h3>
    <div style="text-align:left; height:auto; margin-bottom:-15px; margin-left:10px">
        <b>Tìm kiếm : </b>
        <input type="text" class="search" style="width: 250px">
        <b>Chức vụ : </b>
        <select id="cboChucVuSearch" name="cboChucVu" class="search" style="width: 150px;">
            <option value=''>Chọn</option>
                <?php
                    foreach($ChucVu as $cv){
                        echo "<option value='".$cv["id"]."'>".$cv['ten']."</option>";
                    }
                ?>
        </select>
        <input type="button" value="Áp dụng" style="margin-bottom:-9px; height: 30px; color: white; background-color:dodgerblue; border-color:dodgerblue; width:100px; border-radius:5px">
    </div>
    <table class="table table-hover" style="margin-bottom:50px">
    <tr class="table-dark">
	    <th scope="col">Số điện thoại</th>
        <th scope="col" >Email</th>
        <th scope="col">Họ và tên</th>
	    <th scope="col">Chức vụ</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Sửa</th>
        <th scope="col">Xóa</th>
    </tr> 
	<?php
		foreach ($TaiKhoan as $tk){       
        echo "<th>".$tk['soDienThoai']."</th>";
        echo "<th>".$tk['email']."</th>";
        echo "<th>".$tk['hoTen']."</th>";
        echo "<th>".$tk['ten']."</th>";
        if($tk['status']==1){
            echo "<th>Đang hoạt động</th>";
        }else{
            echo "<th>Không hoạt động</th>";
        }
        
		echo '<th>		
			<a href=index.php?controller=account&Phone='.$tk['soDienThoai'].'>
				<ion-icon name="create-outline"></ion-icon>
			</a>
			</th>
            <th>
          <a href=index.php?controller=account&PhoneDelete='.$tk['soDienThoai'].'>
          <ion-icon name="trash-outline"></ion-icon>
            </a>
  
          </th>';
    echo "<tr/>";;
        //   $message="Hello";
        //   echo "<script>alert('$message');</script>";
	    }
        if(isset($_GET['Phone'])){
            echo '<script>var data=document.getElementById("khung_hinh_update")
            data.style.display="block"</script>';
        }
        if(isset($_GET['PhoneDelete'])){
            echo '<script>var data=document.getElementById("khung_hinh_remove")
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