<?php
    include_once("C:/xampp/htdocs/AdminBookStore/Model/Admin/giohang.php");
    class Giohang_list{
        public function __construct(){
            $Giohang_Model=new Giohang_Model();
            $GioHang=$Giohang_Model->get_all();
        }
    }
?>