<?php
    include_once('C:/xampp/htdocs/AdminBookStore/Model/Admin/listchucvu.php');
    class listChucVu{
        public function __construct(){
            $ChucVu_Model=new ChucVuModel();
            $ChucVu=$ChucVu_Model->ChucVuList();
            include_once('C:/xampp/htdocs/AdminBookStore/View/Admin/Pages/ChucVu/ChucVu.php');
        }
        public function getlist(){
            $ChucVu_Model=new ChucVuModel();
            return $ChucVu=$ChucVu_Model->ChucVuList();
        }
        
    }
    $ChucvuList=new listChucVu();