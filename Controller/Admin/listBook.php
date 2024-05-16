<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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

class ListBook {
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
		$hinhthucModel=new HinhThucModel();
		$book = $bookModel->BookList();
		
		include_once 'C:/xampp/htdocs/BookStoreWeb/View/Admin/Pages/Book/bookList.php';
		include_once 'C:/xampp/htdocs/BookStoreWeb/View/Admin/Pages/Book/editBook.php';



				
				
			}
	
}
$book = new ListBook();
