<?php
include_once("./Model/Admin/listBook.php");
include_once("./Model/Admin/theloai.php");
include_once("./Model/Admin/tacGia.php");
include_once("./Model/Admin/nhaxuatban.php");
include_once("./Model/Admin/imageBook.php");
class ListBook {
	public function __construct()
	{
		$bookModel= new BookModel();
		$tacGiaModel = new TacGiaModel();
		$hinhAnhModel = new HinhAnhModel();
		$book = $bookModel->BookList();
		
		include_once('View/Admin/Pages/Book/bookList.php');
	}
}
$book = new ListBook();
