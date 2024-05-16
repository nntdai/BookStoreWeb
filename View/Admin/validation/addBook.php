<?php

$Err["id"]="";
$idSach="";
$Err["tenSach"]="";
$tenSach="";
$tenTacGia="";
$Err["tenTacGia"]="";
$tenTheLoai="";
$Err["tenTheLoai"]="";
$tenNXB="";
$Err["tenNXB"]="";
$tenNgonNgu="";
$Err["tenNgonNgu"]="";
$tenHinhThuc="";
$Err["tenHinhThuc"]="";
$namXB="";
$Err["namXB"]="";
$giaGoc="";
$Err["giaGoc"]="";

$khuyenMai="";
$Err["khuyenMai"]="";

$soLuongTong="";
$Err["soLuongTong"]="";

$soTrang="";
$Err["soTrang"]="";

$trongLuong="";
$Err["trongLuong"]="";

$kichThuoc="";
$Err["kichThuoc"]="";

$moTa="";
$Err["moTa"]="";

$Err["image"]="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // if (isset($_POST["idSach"])&&isset($_POST["tenSach"])&&$_POST["tenTacGia"]&&$_POST["tenTheLoai"]&&$_POST["tenNXB"]&&$_POST["tenNgonNgu"]&&$_POST["tenHinhThuc"]&&$_POST["namXB"]&&$_POST["giaGoc"]&&$_POST["khuyenMai"]&&$_POST["soLuongTong"]&&$_POST["soTrang"]&&$_POST["trongLuong"]&&$_POST["kichThuoc"]&&$_POST["moTa"]&&$_POST["nguoiDich"])
if (isset($_POST['sumbitAdd']) )
{    
    
$idSach=$_POST["idSach"];
$tenSach=$_POST["tenSach"];
$tenTacGia=$_POST["tenTacGia"];
$tenTheLoai=$_POST["tenTheLoai"];
$tenNXB=$_POST["tenNXB"];
$tenNgonNgu=$_POST["tenNgonNgu"];
$tenHinhThuc=$_POST["tenHinhThuc"];
$namXB=$_POST["namXB"];
$giaGoc=(int) $_POST["giaGoc"];
$khuyenMai=$_POST["khuyenMai"];
$soLuongTong=$_POST["soLuongTong"];
$soTrang=$_POST["soTrang"];
$trongLuong=$_POST["trongLuong"];
$kichThuoc=$_POST["kichThuoc"];
$moTa=$_POST["moTa"];
$nguoiDich=$_POST["nguoiDich"];

    if (empty($idSach))
    {
        $Err["id"]="Mã Sách không được trống !";
    }
    else
    {
    if (strlen($idSach)<13)
    {
        $Err["id"]="Mã Sách phải bao gồm 13 chữ số";
    }
    else 
    {
        foreach ($book as $books)
    {
        if ($books['id']==$idSach)
        {
        $Err["id"]="Mã Sách đã tồn tại trong cơ sở dữ liệu !";
        }
    }
    }
    }
    if (empty(trim($tenSach)))
    {
        $Err["tenSach"]="Tên sách không được trống !";
    }
    if (empty(trim($tenTacGia)))
    {
        $Err["tenTacGia"]="Tên tác giả không được trống !";
    }
    if (empty(trim($tenTheLoai)))
    {
        $Err["tenTheLoai"]="Thể loại không được trống !";
    }
    if (empty(trim($tenNXB)))
    {
        $Err["tenNXB"]="Thể loại không được trống !";
    }
    if ($tenNgonNgu=="Chọn ngôn ngữ")
    {
        $Err["tenNgonNgu"]="Vui lòng chọn ngôn ngữ !";
    }
    
    if ($tenHinhThuc=="Chọn hình thức")
    {
        $Err["tenHinhThuc"]="Vui lòng chọn hình thức !";
    }
    if (strlen($namXB)<4)
    {
        $Err["namXB"]="Năm xuất bản phải có 4 chữ số !";
    }
    else 
    {
        $year = date("Y");
        if ($namXB<1000)
        $Err["namXB"]="Năm xuất bản phải lớn hơn 1000 !";
        if ($namXB>$year)
        $Err["namXB"]="Năm xuất bản phải nhỏ hơn năm hiện tại !";
    }
    if (empty($giaGoc))
    {
        $Err["giaGoc"]="Giá tiền không được trống ! ";
    }
    if (empty($khuyenMai))
    {
        if ($khuyenMai!=0)
        {
        $Err["khuyenMai"]="Khuyến mãi không được để trống !";
        }
    }
    else 
    {
      if ($khuyenMai>100)
      {
        $Err["khuyenMai"]="Khuyến mãi phải nhỏ hơn hơn 100 !";
      }
    }
    if (empty($soLuongTong))

    {
        $Err["soLuongTong"]="Số lượng không được để trống !";
    }
    if (empty($soTrang))
    {
        $Err["soTrang"]="Số trang không được để trống !";
    }
    
    if (empty($trongLuong))
    {
        $Err["trongLuong"]="Trọng lượng không được để trống !";
    }
   
    if (empty($kichThuoc))
    {
        $Err["kichThuoc"]="Kích thước không được trống ! ";
    }
   
    $target_dir = "Image/";
    
    $fileNames = array_filter($_FILES['fileToUpload']['name']); 
    
    $allowTypes = array('jpg','png','jpeg'); 
    $countFile=0;
   if (empty($fileNames))
   {
        $Err["image"]= "Vui lòng chọn ít nhất 1 ảnh cho sản phẩm .";
        

    }
    // else{
    //     foreach($_FILES['fileToUpload']['name'] as $key=>$val){ 
    //         $countFile= $countFile+1;
    //         $fileName = basename($_FILES['fileToUpload']['name'][$key]); 
    //         $targetFilePath = $target_dir . $fileName; 
    //         $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            
    //         if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
                  
    //             $Err["image"]= "Định dạng ảnh không cho phép ( Yêu cầu :'jpg','png','jpeg' )";
    //             }
           
            
    //     }
    //     if ($countFile>5)
    //     {
    //         $Err["image"]= "Chỉ có thể chọn tối đa 5 ảnh  .";
    //     }
    // }
    
    
    
    if (empty($Err["image"])&&empty($Err["id"])&&empty($Err["tenSach"])&&empty($Err["tenTacGia"])&&empty($Err["tenTheLoai"])&&empty($Err["kichThuoc"])&&empty($Err["tenNgonNgu"])&&empty($Err["tenHinhThuc"])&&empty($Err["namXB"])&&empty($Err["tenSach"])&&empty($Err["giaGoc"])&&empty($Err["khuyenMai"])&&empty($Err["soLuongTong"])&&empty($Err["soTrang"])&&empty($Err["trongLuong"]))
    {
        
       
        $tonTaiTacGia=0;
        $tacgiasach =$tacGiaModel->ListTacGia();
             foreach ($tacgiasach as $tacgia)
        {
            if ($tacgia['hoTen']==trim($tenTacGia))
            {
                $tenTacGia=$tacgia['id'];
                $tonTaiTacGia=1;
            }
		 }
        if ($tonTaiTacGia==0)
            {
                $tacGiaModel->addTacGia(trim($tenTacGia));
                $tenTacGia= $tacGiaModel->getID();
                
            }
      
         $theloaisach =$theloaiModel->ListTheLoai();
         foreach ($theloaisach as $theloai)
         {
             
            if ($theloai['tenTheLoai']==trim($tenTheLoai))
            {
                $tenTheLoai=$theloai['id'];
            }
        }
        $tonTaiNXB=0;
        $nxbsach =$nxbModel->ListNXB();
        foreach ($nxbsach as $nxb)
        {
            if ($nxb['tenNXB']==$tenNXB)
            {
                
                $tenNXB=$nxb['id'];
                $tonTaiNXB=1; 
            
            }
        }
        
        if ($tonTaiNXB==0)
            {
                $nxbModel->addNhaXuatBan(trim($tenNXB));
                $tenNXB= $nxbModel->getID();
                
            }
   
    $alert['success']="Thêm sách thành công !";
    
    $sql=$bookModel->addBook($idSach, $tenSach,$tenTacGia , $tenTheLoai ,$nguoiDich,$moTa, $tenNXB,$tenNgonNgu, $tenHinhThuc, $namXB,$giaGoc,$khuyenMai,$soLuongTong,$soTrang,$trongLuong,$kichThuoc);
            
    $tacGiaModel->addTacGia_Sach($tenTacGia,$idSach);
    foreach($_FILES['fileToUpload']['name'] as $key=>$val)
        {
            $fileName = basename($_FILES['fileToUpload']['name'][$key]); 
            $targetFilePath = $target_dir . $fileName; 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
        
            if (!file_exists($targetFilePath)) {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $targetFilePath);
              }
              
              $sql=$hinhAnhModel->addHinhAnh_Sach($targetFilePath,$idSach);
          
             
            
        }
    $moTa="";
    $nguoiDich="";
    $idSach="";
    $tenSach="";
    $tenTacGia="";
    $tenTheLoai="";
    $tenNXB="";
    $tenNgonNgu="";
    $tenHinhThuc="";
    $namXB="";
    $giaGoc="";
    $khuyenMai="";
    $soLuongTong="";
    $soTrang="";
    $trongLuong="";
    $kichThuoc="";
    
  
    }
}

}
?>