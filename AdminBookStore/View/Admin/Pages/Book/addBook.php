

<!DOCTYPE html>
<link rel="stylesheet" href="./Public/Admin/Pages/Home/addBook.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



<html>

<head>
	<meta charset="UTF-8"/>
	<title>list</title>
   
    


</head>
<body>
<?php require "C:/xampp/htdocs/AdminBookStore/View/Admin/validation/addBook.php" ?>
<?php  
                        if (isset($alert['success'])) {?>
                            <div class="form-group alert alert-primary">
                                <?=$alert['success']?>
                            </div>
                        <?php }
                    ?>
<div id="container-addBook" >
    <!-- <button id="btnAddBook" class="btn btn-primary">Thêm sách</button>  -->
    <!-- <div id="myModal" class="modal">
    <div id="modal_addbook">     -->
    
    <div class="title_addbook">
        
        <h1> Thêm sách </h1>
        </div>
        <div id="addBook-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?controller=Book" ; ?>" enctype="multipart/form-data">
           
                <div class="card-body">
                    <?php  
                        if (isset($alert['success'])) {?>
                            <div class="form-group alert alert-primary">
                                <?=$alert['success']?>
                            </div>
                        <?php }
                    ?>
                <div  class="row">
                   <div class="col">
                        <label>Mã sách</label>
                        <input type="text" name="idSach" value="<?php echo $idSach ?? '' ?>" class="form-control" placeholder="Mã sách" maxlength="13" onkeypress="return isNumberKey(event)">
                        <div class="error" style="color:red">
                        <?php echo $Err["id"]; ?>
                        </div>
                       
                        <label>Tên Sách</label>
                        <input type="text" id="tenSach" name="tenSach" value="<?php echo $tenSach ?? '' ?>" class="form-control" placeholder="Tên Sách">
                        <div class="error" style="color:red">
                        <?php echo $Err["tenSach"]; ?>
                        </div>
                        <label>Tác giả</label>
                       
                        <input type="text" name="tenTacGia" value="<?php echo $tenTacGia?? '' ?>" class="form-select" list="listTacGia">
                                <datalist id="listTacGia">
                                <?php
                                    $tacgiasach =$tacGiaModel->ListTacGia();
                                    foreach ($tacgiasach as $tacgia)
                                    {
                                    echo '<option value="'.$tacgia['hoTen'].'" data-value='.$tacgia['id'].'></option>';
		                              }
                                    ?>
                                </datalist> 
                    <div class="error" style="color:red">
                        <?php echo $Err["tenTacGia"]; ?>
                        </div>                                          
                                    
                                
                        
                        
                        
                         <div id="theloaiDiv" style="">

                                <label>Thể loại</label>
                        
                                <input type="text" name="tenTheLoai" value="<?php echo $tenTheLoai?? '' ?>" list="listTheLoai" class="form-select" >
                                <datalist id="listTheLoai">
                                    <?php
                                    $theloaisach =$theloaiModel->ListTheLoai();
                                    foreach ($theloaisach as $theloai)
                                    {
                                        
                                      echo '<option value="'.$theloai['tenTheLoai'].'" data-value='.$theloai['id'].'>'.$theloai['tenDanhMuc']." > ".$theloai['tenChuDe']." > ".$theloai['tenTheLoai'].'</option>';
		                              }
                                    ?>
                                </datalist>
                                <div class="error" style="color:red">
                        <?php echo $Err["tenTheLoai"]; ?>
                        </div>      
                                    </div>
                                    </div>
                                    <div class="col">
                        <label>Nhà Xuất Bản</label>
                        <input type="text" name="tenNXB" value="<?php echo $tenNXB ?? '' ?>" list="listNhaXuatBan" class="form-select" >
                        <datalist id="listNhaXuatBan">
                                    <?php
                                    $nxbsach =$nxbModel->ListNXB();
                                    foreach ($nxbsach as $nxb)
                                    {
                                      echo '<option value="'.$nxb['tenNXB'].'" data-value='.$nxb['id'].'></option>';
		                            }
                                    ?>
                                </datalist> 
                            <div class="error" style="color:red">
                        <?php echo $Err["tenNXB"]; ?>
                        </div>  
                        
                        <label>Ngôn Ngữ</label>
                        <select id="tenNgonNgu" name="tenNgonNgu" class="form-select" aria-label="Default select example">
                        <option selected>Chọn ngôn ngữ</option>
                        <?php
                                    $ngonngusach =$ngonnguModel->ListNgonNgu();
                                    foreach ($ngonngusach as $ngonngu)
                                    {
                                      echo '<option value="'.$ngonngu['id'].'">'.$ngonngu['tenNgonNgu'].'</option>';
		                            }
                        ?>

                        </select>
                        <div class="error" style="color:red">
                        <?php echo $Err["tenNgonNgu"]; ?>
                        </div>  
                        
                        <label>Hình thức</label>
                        <select class="form-select" id="tenHinhThuc" name="tenHinhThuc" aria-label="Default select example">
                        <option selected>Chọn hình thức</option>
                        <?php
                                    $hinhthucsach =$hinhthucModel->ListHinhThuc();
                                    foreach ($hinhthucsach as $hinhthuc)
                                    {
                                      echo '<option value="'.$hinhthuc['id'].'">'.$hinhthuc['ten'].'</option>';
		                            }
                        ?>

                        </select>
                        <div class="error" style="color:red">
                        <?php echo $Err["tenHinhThuc"]; ?>
                        </div>  
                        <label>Năm xuất bản</label>

                        <input type="text" id="namXB" name="namXB" value="<?php echo $namXB?? '' ?>"  maxlength="4" class="form-control" placeholder="Năm xuất bản" onkeypress="return isNumberKey(event)">
                        <div class="error" style="color:red">
                        <?php echo $Err["namXB"]; ?>
                        </div>  
                                    </div>
                        <div class="col">
                        
                                      
                        <label>Người dịch</label>
                            <input type="text" name="nguoiDich" id="nguoiDich" class="form-control" value="<?php echo $nguoiDich?? '' ?>" placeholder=""\>
                        <label>Giá gốc</label>
                            <input type="number" id="giaGoc" name="giaGoc" onkeypress="return isNumberKey(event)"  value="<?php echo $giaGoc?? '' ?>" min="0" step="1000" class="form-control" placeholder=""\>
                            <div class="error" style="color:red">
                        <?php echo $Err["giaGoc"]; ?>
                        </div>  
                        <label>Khuyến mãi</label>
                            <input type="type" id="khuyenMai" name="khuyenMai" value="<?php echo $khuyenMai?? '' ?>" maxlength="3" class="form-control" onkeypress="return isNumberKey(event)" placeholder=""\>
                            <div class="error" style="color:red">
                        <?php echo $Err["khuyenMai"]; ?>
                        </div> 
                        <label>Số lượng tổng</label>
                            <input type="text" id="soLuongTong" name="soLuongTong" value="<?php echo $soLuongTong?? '' ?>"  class="form-control" onkeypress="return isNumberKey(event)" placeholder=""\>
                            <div class="error" style="color:red">
                        <?php echo $Err["soLuongTong"]; ?>
                        </div> 
                        </div>
                                    
                        <div class="col">
                                      
                        <label>Trọng lượng</label>
                            <input type="text" id="trongLuong" name="trongLuong" value="<?php echo $trongLuong?? '' ?>" onkeypress="return isNumberKey(event)" class="form-control" placeholder=""\>
                            <div class="error" style="color:red">
                        <?php echo $Err["trongLuong"]; ?>
                        </div> 
                       
                        <label>Số trang</label>
                            <input type="text" id="soTrang" name="soTrang" value="<?php echo $soTrang?? '' ?>"  onkeypress="return isNumberKey(event)" class="form-control" placeholder=""\>
                            <div class="error" style="color:red">
                        <?php echo $Err["soTrang"]; ?>
                        </div> 
                        
                        <label>Kích thước bao bì</label>
                            <input type="text" id="kichThuoc" name="kichThuoc" value="<?php echo $kichThuoc?? '' ?>"  onkeypress="return isNumberKey(event)" class="form-control" placeholder=""\>
                            <div class="error" style="color:red">
                        <?php echo $Err["kichThuoc"]; ?>
                        </div> 
                        <label>Hình ảnh sách</label>
                        <input type="file" multiple  accept="image/jpeg, image/png, image/jpg" name="fileToUpload[]" id="fileToUpload">
                        <div class="error" style="color:red">
                        <?php echo $Err["image"]; ?>
                        </div> 
                        </div>
                        <div class="col">
                       
                        <div id="imageContainer" >

                        </div>
                       

                        </div>
                    </div>
                    <div  class="row">
                    <label>Mô tả</label>
                            <textarea type="text" id="moTa" name="moTa" value="<?php echo $moTa?? '' ?>"  class="form-control" placeholder=""></textarea>
                            <div class="error" style="color:red">
                        <?php echo $Err["moTa"]; ?>
                        </div> 
                    </div>
                    </div>
                    <br>
                    <button type="submit" name="sumbitAdd" class="btn btn-primary">Thêm Sách</button>
                    
                    
                </div>
            </form>
      
</div>
                                    <!-- </div>
</div> -->

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js" integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
 $(function(){
  $("#tacgiaSelect").selectize();
 }); 
 </script>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script>
    
     var imageInput = document.getElementById("fileToUpload");
     var imgContainer =document.getElementById("imageContainer")
   function removeFileFromFileList(index) {
  const dt = new DataTransfer()
  const input = document.getElementById('fileToUpload')
  const { files } = input
  
  for (let i = 0; i < files.length; i++) {
    const file = files[i]
    if (index !== i)
      dt.items.add(file) // here you exclude the file. thus removing it.
  }
  
  input.files = dt.files // Assign the updates list
}
imageInput.addEventListener("change", function (e) {
    imgContainer.innerHTML='';
    if (imageInput.files.length<=5)
    {
    for (let i=0;i<imageInput.files.length;i++)
    {
  var file = imageInput.files[i];
  var fileSize = file.size/1024/1024;
  if (file) {
    if (fileSize > 4) { 
            alert('Kích thước file vừa chọn quá lớn !');
            $('#fileToUpload').val('');
        }
        else
        {
    const reader = new FileReader();
    reader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">x</span>" +
            "</span>").appendTo("#imageContainer");
          $(".remove").click(function(){
            removeFileFromFileList(i);
            $(this).parent(".pip").remove();
            
            // var myFiles = Object.entries(document.getElementById('fileToUpload').files)
            // alert(myFiles);
            // Object.entries(myFiles.splice(i-1, 1))
            // alert(myFiles);
          });
        });
    //   const img = document.createElement("img");
    //   img.src = event.target.result;
    //   img.style.height="100px";
    //   img.style.width="100px";
    //    imgContainer.appendChild(img);
    
    reader.readAsDataURL(file);
    }
  }}}
  else{
    alert('Chỉ có thể chọn tối đa 5 ảnh !');
    $('#fileToUpload').val('');
  }
});
    function isNumberKey(evt) {
  var charCode = (evt.which) ? evt.which : evt.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
}

//     function idDanhMucDuocChon() {
//         var input=document.getElementById("danhMucInput");
//         var dl=document.getElementById("listDanhMuc");
//         var inputChuDe=document.getElementById("inputChuDe");
//     if (input.value.trim() !== '') {
        
//         // var opSelected = document.querySelector("#listDanhMuc option[value='" + input.value + "']").dataset.value;
//         var opSelected = document.querySelector("#listDanhMuc" + " option[value='" + input.value + "']").dataset.value;
//         inputChuDe.value=opSelected;
//     }
    
// }

    // Get the modal

    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
