

<!DOCTYPE html>
<link rel="stylesheet" href="./Public/Admin/Pages/Home/addBook.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
  
  
</script>


<html>

<head>
	<meta charset="UTF-8"/>
	<title>list</title>
   <script>
    $(document).on("click", "#submitEdit", function() {
            var idEditSach = $('#editForm #idEditSach').val();
            var tenSachSua = $('#editForm #tenSachSua').val();
            var tenTacGiaSua=$('#tenTacGiaSua').val();
            var tenTheLoaiSua=$('#tenTheLoaiSua').val();
            var tenNXBSua=$('#tenNXBSua').val();
            var tenNgonNguSua=$('#tenNgonNguSua').val();
            var tenHinhThucSua=$('#tenHinhThucSua').val();
            var namXBSua=$('#namXBSua').val();
            var giaGocSua=$('#giaGocSua').val();
            var khuyenMaiSua=$('#khuyenMaiSua').val();
            var soLuongTongSua=$('#soLuongTongSua').val();
            var soTrangSua=$('#soTrangSua').val();
            var trongLuongSua=$('#trongLuongSua').val();
            var kichThuocSua=$('#kichThuocSua').val();
            var moTaSua=$('#moTaSua').val();
            var nguoiDichSua=$('#nguoiDichSua').val();
            // if ((trim(idEditSach)=='')||(trim(tenSachSua)=='')||(trim(tenTacGiaSua)=='')||(trim(tenTheLoaiSua)=='')||(trim(tenNXBSua)=='')||(trim(tenNgonNguSua)=='Chọn ngôn ngữ')||(trim(tenHinhThucSua)=='Chọn hình thức')||(trim(namXBSua)=='')||(trim(giaGocSua)=='')||(trim(khuyenMaiSua)=='')||(trim(soLuongTongSua)=='')||(trim(soTrangSua)=='')||(trim(trongLuongSua)=='')||(trim(kichThuocSua)=='')||(trim(moTaSua)==''))
            // {
            //     alert "Không được bỏ trống bất kì trường nào ngoài người dịch !";
            // }
            
            $.ajax({
                url: "validation/editAjax.php",
                type: "POST",
                catch: false,
                data: {
                    updated: 1,
                    idEditSach: idEditSach,
                    tenSachSua: tenSachSua,
                    tenTacGiaSua:tenTacGiaSua,
                    tenTheLoaiSua:tenTheLoaiSua,
                    tenNXBSua:tenNXBSua,
                    tenNgonNguSua:tenNgonNguSua,
                    tenHinhThucSua:tenHinhThucSua,
                    namXBSua:namXBSua,
                    giaGocSua:giaGocSua,
                    khuyenMaiSua:khuyenMaiSua,
                    soLuongTongSua:soLuongTongSua,
                    soTrangSua:soTrangSua,
                    trongLuongSua:trongLuongSua,
                    kichThuocSua:kichThuocSua,
                    moTaSua:moTaSua,
                    nguoiDichSua:nguoiDichSua
                },
                success: function(result) {
                    location.reload();
                    alert(result);
            }
                
            });
        }); 
   </script>
</head>
<body>

<div id="modal" class="modal fade" >
	<div class="modal-dialog modal-xl">
  <div class="title_addbook" style="background-color:rgb(34,40,49);color:white">
  <button type="button" class="btn-close btn-close-white"  data-bs-dismiss="modal" style="float:right;padding-right: 30px;padding-top:20px"></button>
        <h1> Sửa sách </h1>
        </div>
        <div id="editBook-form" class="modal-content">
        <form method="post" id="editForm" onsubmit="return false">
            
           <div class="card-body">
              
           <div class="row">
              <div class="col">
                   <label>Mã sách</label>
                   <input type="text" readonly="readonly" id="idEditSach" name="idEditSach" value="" class="form-control" placeholder="Mã sách" maxlength="13" onkeypress="return isNumberKey(event)">
                   <div class="error" style="color:red">
                   
                   </div>
                  
                   <label>Tên Sách</label>
                   <input type="text" id="tenSachSua" name="tenSachSua" value="" class="form-control" placeholder="Tên Sách">
                   <div class="error" style="color:red">
                   
                   </div>
                   <label>Tác giả</label>
                  
                   <input type="text" name="tenTacGiaSua" id="tenTacGiaSua" value="" class="form-select" list="listTacGia">
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
                   
                   </div>                                          
                               
                           
                   
                   
                   
                    <div id="theloaiDiv" style="">

                           <label>Thể loại</label>
                   
                           <input type="text" name="tenTheLoaiSua" id="tenTheLoaiSua" value="" list="listTheLoai" class="form-select" >
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
                  
                   </div>      
                               </div>
                               </div>
                               <div class="col">
                   <label>Nhà Xuất Bản</label>
                   <input type="text" name="tenNXBSua" id="tenNXBSua" value="" list="listNhaXuatBan" class="form-select" >
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
                   
                   </div>  
                   
                   <label>Ngôn Ngữ</label>
                   <select id="tenNgonNguSua" name="tenNgonNguSua" id="tenNgonNguSua" class="form-select" aria-label="Default select example">
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
                   
                   </div>  
                   
                   <label>Hình thức</label>
                   <select class="form-select" id="tenHinhThucSua" name="tenHinhThucSua" aria-label="Default select example">
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
                   
                   </div>  
                   <label>Năm xuất bản</label>

                   <input type="text" id="namXBSua" name="namXBSua" value=""  maxlength="4" class="form-control" placeholder="Năm xuất bản" onkeypress="return isNumberKey(event)">
                   <div class="error" style="color:red">
                  
                   </div>  
                               </div>
                   <div class="col">
                   
                                 
                   <label>Người dịch</label>
                       <input type="text" name="nguoiDichSua" id="nguoiDichSua" class="form-control" value="" placeholder=""\>
                   <label>Giá gốc</label>
                       <input type="number" id="giaGocSua" name="giaGocSua" onkeypress="return isNumberKey(event)"  value="<?php echo $giaGoc?? '' ?>" min="0" step="1000" class="form-control" placeholder=""\>
                       <div class="error" style="color:red">
                  
                   </div>  
                   <label>Khuyến mãi</label>
                       <input type="type" id="khuyenMaiSua" name="khuyenMaiSua" value="" maxlength="3" class="form-control" onkeypress="return isNumberKey(event)" placeholder=""\>
                       <div class="error" style="color:red">
                   
                   </div> 
                   <label>Số lượng tổng</label>
                       <input type="text" id="soLuongTongSua" name="soLuongTongSua" value=""  class="form-control" onkeypress="return isNumberKey(event)" placeholder=""\>
                       <div class="error" style="color:red">
                   
                   </div> 
                   </div>
                               
                   <div class="col">
                                 
                   <label>Trọng lượng</label>
                       <input type="text" id="trongLuongSua" name="trongLuongSua" value="" onkeypress="return isNumberKey(event)" class="form-control" placeholder=""\>
                       <div class="error" style="color:red">
                  
                   </div> 
                  
                   <label>Số trang</label>
                       <input type="text" id="soTrangSua" name="soTrangSua" value=""  onkeypress="return isNumberKey(event)" class="form-control" placeholder=""\>
                       <div class="error" style="color:red">
                  
                   </div> 
                   
                   <label>Kích thước bao bì</label>
                       <input type="text" id="kichThuocSua" name="kichThuocSua" value=""  onkeypress="return isNumberKey(event)" class="form-control" placeholder=""\>
                       <div class="error" style="color:red">
                   
                   </div> 
                   <label>Hình ảnh sách</label>
                   <input type="file" multiple  accept="image/jpeg, image/png, image/jpg" name="fileToUpload[]" id="fileToUpload">
                   <div class="error" style="color:red">
                  
                   </div> 
                   </div>
                   <div class="col">
                  
                   <div id="imageContainer">

                   </div>
                  

                   </div>
               </div>
               <div  class="row">
               <label>Mô tả</label>
                       <textarea type="text" id="moTaSua" name="moTaSua" value=""  class="form-control" placeholder=""></textarea>
                       <div class="error" style="color:red">
                   
                   </div> 
               </div>
               </div>
               <br>
               <button type="submit" id="submitEdit" name="submitEdit" class="btn btn-primary">Sửa Sách</button>
               
               
           
       </form>
       </div>
        </div>
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
// var modal = document.getElementById("myModal");

// // Get the button that opens the modal
// var btn = document.getElementById("btnAddBook");

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks on the button, open the modal
// btn.onclick = function() {
//   modal.style.display = "block";
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
