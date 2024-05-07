<?php
include_once("./Model/Admin/listBook.php");
include_once("./Model/Admin/theloai.php");
include_once("./Model/Admin/tacGia.php");
include_once("./Model/Admin/nhaxuatban.php");
include_once("./Model/Admin/imageBook.php");
class addBook {
	public function __construct()
	{

		$tacGiaModel = new TacGiaModel();
		$hinhAnhModel = new HinhAnhModel();
        $theloaiModel = new TheLoaiModel();
        $nxbModel= new NhaXuatBanModel();

		include_once('View/Admin/Pages/Book/addBook.php');
	}
}
$book = new addBook();
