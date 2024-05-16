<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8"/>
	<title>list</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="./Public/Admin/Pages/Home/addBook.css">
		<script>
		$(document).ready(function(){
	
	$('.userInfo').click(function(){
		
		 var idSachSua = $(this).data('id');
        
		 
		 // AJAX request
		 $.ajax({
			   url: 'validation/ajax.php',
			   type: 'post',
			   data: {idSachSua: idSachSua},
              
			   success: function(value){ 
				var data = value.split(",");
					// Add response in Modal body
					$('#idEditSach').val(data[0]);
					$('#tenSachSua').val(data[1]);
					$('#tenTacGiaSua').val(data[2]);
					$('#tenTheLoaiSua').val(data[3]);
					$('#tenNXBSua').val(data[4]);
					$('#tenNgonNguSua').val(data[5]);
					$('#tenHinhThucSua').val(data[6]);
					$('#namXBSua').val(data[7]);
					$('#nguoiDichSua').val(data[8]);
					$('#giaGocSua').val(data[9]);
					$('#khuyenMaiSua').val(data[10]);
					$('#soLuongTongSua').val(data[11]);
					$('#trongLuongSua').val(data[12]);
					$('#soTrangSua').val(data[13]);
					$('#kichThuocSua').val(data[14]);
					$('#moTaSua').text(data[15]);
					
					// Display Modal
					$('#modal').modal('show'); 
			   }
		 });
	});
	});
	
	$(document).ready(function(){
	
	$('.deleteBook').click(function(){
		
		 var idSachXoa = $(this).data('id');
        
		 $('#deleteBTN').click(function(){
		 // AJAX request
		 $.ajax({
			   url: 'validation/deleteBook.php',
			   type: 'post',
			   data: {idSachXoa: idSachXoa},
			   success: function(value){ 
				alert(value);
				location.reload();
				
			   }
		 });
		});
	});
	});
    </script>
</head>

<body>
<?php require "C:/xampp/htdocs/BookStoreWeb/View/Admin/validation/addBook.php" ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa sách </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có chắc muốn xóa sách này chứ ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="deleteBTN" class="btn btn-danger">Xóa </button>
      </div>
    </div>
  </div>
</div>
 	
<?php  
                        if (isset($alert['success'])) {?>
                            <div class="form-group alert alert-primary">
                                <?=$alert['success']?>
                            </div>
                        <?php }
                    ?>
	<div id="container-listBook">
	
		<div style="width=1000px">
	<h2 >Danh sách</h2>
		</div>
    <table class="table table-hover" style ="background-color:white">
    <tr class="table-dark">
	<th >Ảnh</th>
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
		echo '<img class="img-thumbnail" src="/BookStoreWeb/'.$hinhanhSach[0]['url'].'"  width="100px" height="20%">';
		
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
			
			<button id='.$books['id'].'  data-id='.$books['id'].' class="userInfo btn btn-info"><ion-icon name="create-outline"></ion-icon></button>
			
			</th>
			<th>	
			
			<button id='.$books['id'].' data-id='.$books['id'].' class="deleteBook btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><ion-icon name="trash-outline"></ion-icon></button>
			
		
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

<script>
	var modal = document.getElementById("modal");
	
// Get the button that opens the modal


// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks on the button, open the modal

// function edit(btn)
// {
// 	modal.style.display = "block";
// }

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) 
// {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }

</script>
</html>