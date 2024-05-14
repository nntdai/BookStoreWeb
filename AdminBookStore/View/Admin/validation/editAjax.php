<?php
include './listBook.php';
include './nhaxuatban.php';
include './tacGia.php';
include './theloai.php';
if(isset($_POST['updated']))
{

$idSachSua=$_POST['idEditSach'];
$tenSachSua=$_POST['tenSachSua'];
$tenTacGiaSua=$_POST["tenTacGiaSua"];
$tenTheLoaiSua=$_POST["tenTheLoaiSua"];
$tenNXBSua=$_POST["tenNXBSua"];
$tenNgonNguSua=$_POST["tenNgonNguSua"];
$tenHinhThucSua=$_POST["tenHinhThucSua"];
$namXBSua=$_POST["namXBSua"];
$giaGocSua=$_POST["giaGocSua"];
$khuyenMaiSua=$_POST["khuyenMaiSua"];
$soLuongTongSua=$_POST["soLuongTongSua"];
$soTrangSua=$_POST["soTrangSua"];
$trongLuongSua=$_POST["trongLuongSua"];
$kichThuocSua=$_POST["kichThuocSua"];
$moTaSua=$_POST["moTaSua"];
$nguoiDichSua=$_POST["nguoiDichSua"];

$tonTaiTacGiaSua=0;
$tacGiaModel=new TacGiaModel();
$tacgiasach =$tacGiaModel->ListTacGia();
     foreach ($tacgiasach as $tacgia)
{
    if ($tacgia['hoTen']==trim($tenTacGiaSua))
    {
        $tenTacGiaSua=$tacgia['id'];
        $tonTaiTacGiaSua=1;
    }
 }
if ($tonTaiTacGiaSua==0)
    {
        $tacGiaModel->addTacGia(trim($tenTacGiaSua));
        $tenTacGiaSua= $tacGiaModel->getID();
        
    }
    $theloaiModel=new TheLoaiModel();
 $theloaisach =$theloaiModel->ListTheLoai();
 foreach ($theloaisach as $theloai)
 {
     
    if ($theloai['tenTheLoai']==trim($tenTheLoaiSua))
    {
        $tenTheLoaiSua=$theloai['id'];
    }
}
$tonTaiNXBSua=0;
$nxbModel=new NhaXuatBanModel();
$nxbsach =$nxbModel->ListNXB();
foreach ($nxbsach as $nxb)
{
    if ($nxb['tenNXB']==$tenNXBSua)
    {
        
        $tenNXBSua=$nxb['id'];
        $tonTaiNXBSua=1;
       
    
    }
}

if ($tonTaiNXBSua==0)
    {
        $nxbModel->addNhaXuatBan(trim($tenNXBSua));
        $tenNXBSua= $nxbModel->getID();
        
    }

    $bookModel=new BookModel();

$sql=$bookModel->updateBook($idSachSua, $tenSachSua,$tenTacGiaSua , $tenTheLoaiSua ,$nguoiDichSua,$moTaSua, $tenNXBSua,$tenNgonNguSua, $tenHinhThucSua, $namXBSua,$giaGocSua,$khuyenMaiSua,$soLuongTongSua,$soTrangSua,$trongLuongSua,$kichThuocSua);
echo "Sửa thành công !";
$tacGiaModel->addTacGia_Sach($tenTacGiaSua,$idSachSua);
// $alert['success']="Thêm sách thành công !";
// echo "Employee has been sucessfully updated.";
}
?>