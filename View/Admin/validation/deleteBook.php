<?php
include './listBook.php';


if(isset($_POST['idSachXoa']))
		{
            

			$idSachXoa=$_POST['idSachXoa'];
            
            $bookModel=new BookModel();
			$sql=$bookModel->deleteBook($idSachXoa);
			echo "Xóa thành công !";
			
			
			
			
		
		
		
			
			
		}