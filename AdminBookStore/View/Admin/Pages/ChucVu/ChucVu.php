<?php
    include_once("Controller/Admin/listChucVu.php");
    $Chucvu_Control=new listChucVu();
    $ChucVu=$Chucvu_Control->getlist();
?>
<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<html>

<head>
	<link rel="stylesheet" href="Public/Admin/Pages/Home/chucvu.css">
    <script src="Public/Admin/Pages/Home/js/ChucVu.js"></script>
	<meta charset="UTF-8"/>
	<title>list</title>
</head>
<body>
    <!-- <form method="POST" action="" onsubmit="return check_data()">
        <div id="khung">
            <div style="margin:10px; text-align: left">
                <h2>Thêm chức vụ</h2>
            </div>
            <div style="margin-left:10px; text-align:left">
                <b>Tên chức vụ :</b>
                <input type="text" id="NameText" name="NameText" size="25" style="border-radius: 5px; border: solid 1px; border-color: darkgray">
                <input type="submit" id="Addbtn" name="Addbtn" value="Thêm chức vụ" style="background-color:dodgerblue; border-color:dodgerblue; border-radius: 5px; color:white" >
            </div>
            <div id="Error"></div>
            <div id="PhanQuyen">
                
            </div>
        </div>
    </form> -->
	<div id="container-listBook">
	<h2>Danh sách chức vụ</h2>
    <table class="table table-hover">
    <tr>
	    <th scope="col">Mã chức vụ</th>
        <th scope="col" >Tên chức vụ</th>
        <th scope="col">Trạng thái</th>
	    <th scope="col">Sửa</th>
	    <th scope="col">Xóa</th>
    </tr> 
	<?php
		foreach ($ChucVu as $chucvu){       
        echo "<th>".$chucvu['id']."</th>";
        echo "<th>".$chucvu['ten']."</th>";
        if($chucvu['status']==1){
            echo "<th>Đang hoạt động</th>";
        }else{
            echo "<th>Không hoạt động</th>";
        }
        
		echo '<th>		
			<a href=">">
				<ion-icon name="create-outline"></ion-icon>
			</a>
			</th>
			<th>	
			<a href=">">
				<ion-icon name="trash-outline"></ion-icon>
			</a>
		
				</th>';
	  	echo "<tr/>";
        //   $message="Hello";
        //   echo "<script>alert('$message');</script>";
	    }
        if(isset($_POST['Addbtn'])){
            $data=isset($_POST['NameText']) ? $_POST['NameText'] : '';
            // echo "<script>alert('$data');</script>";
            $temp=0;
            foreach ($ChucVu as $chucvu){
                if(strcasecmp($data, $chucvu['ten']) == 0){
                    $temp= 1;
                }
            }
            if($temp== 1){
                echo "<script>
                    document.getElementById('Error').setAttribute('style','color:red; text-align:left; margin-left:110px')
                    document.getElementById('Error').innerHTML='Tên chức vụ tồn tại !'
                    document.getElementById('NameText').setAttribute('style','border: solid 1px; border-color:red; border-radius:5px')
                    document.getElementById('NameText').value='$data'
                    </script>";
            }else{

            }
        }
	?>
	<br>
</div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
<!-- <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> -->
</html>