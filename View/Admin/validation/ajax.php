<?php
include_once "C:/xampp/htdocs/BookStoreWeb/Model/Admin/listBook.php";
include_once "C:/xampp/htdocs/BookStoreWeb/Model/Admin/imageBook.php";

if(isset($_POST['idSachSua']))
		{
            

			$idEditSach=$_POST['idSachSua'];
            $bookModel=new BookModel();
			$bookEdit=$bookModel->getBook($_POST['idSachSua']);
			// $hinhAnhModel=new HinhAnhModel();
			// $hinhAnh=$hinhAnhModel->DanhSachHinhAnh($_POST['idSachSua']);
			
			
			
			echo $bookEdit['id'].",".$bookEdit[1].",".$bookEdit['hoTen'].",".$bookEdit['tenTheLoai'].",".$bookEdit['tenNXB'].",".$bookEdit['idNgonNgu'].",".$bookEdit['idHinhThuc'].",".$bookEdit['namXB'].",".$bookEdit['tenNguoiDich'].",".$bookEdit['giagoc'].",".$bookEdit['phanTramKhuyenMai'].",".$bookEdit['soLuongCon'].",".$bookEdit['trongLuong'].",".$bookEdit['soTrang'].",".$bookEdit['kichThuocBaoBi'].",".$bookEdit['moTa'];
			
			
		
		
		
			
			
		}