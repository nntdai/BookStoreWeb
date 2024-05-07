<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<html>

<head>
	<meta charset="UTF-8"/>
	<title>list</title>
</head>

<body>
	<div id="container-listBook">
	<h2>Danh sách</h2>
    <table class="table table-hover">
    <tr>
	<th>Ảnh</th>
       <th scope="col">Mã sách</th>
       <th scope="col" >Tên sách</th>
       <th scope="col">Tác giả</th>
       <th scope="col">Thể loại</th> 
       <th scope="col">Giá</th>
       <th scope="col">Số lượng còn lại</th>
	   <th scope="col">Sửa</th>
	   <th scope="col">Xóa</th>
    </tr> 
	<?php
		foreach ($book as $books)
	{       
        echo "<tr>";
		echo "<th>";
		$hinhanhSach = $hinhAnhModel->DanhSachHinhAnh($books['id']);
		echo '<img src="'.$hinhanhSach[0]['url'].'"  width="125" height="150">';
		
		echo "</th>";
        echo "<th>".$books['id']."</th>";
        echo "<th>".$books[1]."</th>";
        echo "<th>";
		$tacgiaSach = $tacGiaModel->ListTacGiaSach($books['id']);
		foreach ($tacgiaSach as $tacgia)
		{
			echo $tacgia['hoTen'];
			echo "<br>";
		}
		echo "</th>";
        echo "<th>".$books['tenTheLoai']."</th>";
        echo "<th>".$books['giagoc']."</th>";
        echo "<th>".$books['soLuongCon']."</th>";
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
	}
    echo  " </table>";

	?>

	<br>
</div>
	
</body><script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>