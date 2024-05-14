<?php
include_once "C:/xampp/htdocs/AdminBookStore/Model/Admin/listBook.php";
include_once "C:/xampp/htdocs/AdminBookStore/Model/Admin/theloai.php";
include_once "C:/xampp/htdocs/AdminBookStore/Model/Admin/tacGia.php";
include_once "C:/xampp/htdocs/AdminBookStore/Model/Admin/nhaxuatban.php";
include_once "C:/xampp/htdocs/AdminBookStore/Model/Admin/imageBook.php";
include_once "C:/xampp/htdocs/AdminBookStore/Model/Admin/danhmuc.php";
include_once "C:/xampp/htdocs/AdminBookStore/Model/Admin/chude.php";
include_once "C:/xampp/htdocs/AdminBookStore/Model/Admin/ngonngu.php";
include_once "C:/xampp/htdocs/AdminBookStore/Model/Admin/hinhthuc.php";
class addBook {
	public function __construct()
	{
		$bookModel= new BookModel();
		$tacGiaModel = new TacGiaModel();
		$hinhAnhModel = new HinhAnhModel();
        $theloaiModel = new TheLoaiModel();
        $nxbModel= new NhaXuatBanModel();
		$danhmucModel=new DanhMucModel();
		$chudeModel=new ChuDeModel();
		$ngonnguModel=new NgonNguModel();
		$book = $bookModel->BookList();
		$hinhthucModel=new HinhThucModel();
		
		include_once 'C:/xampp/htdocs/AdminBookStore/View/Admin/Pages/Book/addBook.php';
	}
}
$book = new addBook();
