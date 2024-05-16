<?php
include_once "C:/xampp/htdocs/BookStoreWeb/Model/Admin/listBook.php";
include_once "C:/xampp/htdocs/BookStoreWeb/Model/Admin/theloai.php";
include_once "C:/xampp/htdocs/BookStoreWeb/Model/Admin/tacGia.php";
include_once "C:/xampp/htdocs/BookStoreWeb/Model/Admin/nhaxuatban.php";
include_once "C:/xampp/htdocs/BookStoreWeb/Model/Admin/imageBook.php";
include_once "C:/xampp/htdocs/BookStoreWeb/Model/Admin/danhmuc.php";
include_once "C:/xampp/htdocs/BookStoreWeb/Model/Admin/chude.php";
include_once "C:/xampp/htdocs/BookStoreWeb/Model/Admin/ngonngu.php";
include_once "C:/xampp/htdocs/BookStoreWeb/Model/Admin/hinhthuc.php";
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
		
		include_once 'C:/xampp/htdocs/BookStoreWeb/View/Admin/Pages/Book/addBook.php';
	}
}
$book = new addBook();
