<?php
    include_once('C:/xampp/htdocs/AdminBookStore/Model/Admin/listchucvu.php');
    class listChucVu{
        private $ChucVu_Model;
        public function __construct(){
            $this->ChucVu_Model=new ChucVuModel();
        }
        public function getlist(){
            return $this->ChucVu_Model->ChucVuList();
        }
        
    }
    $ChucvuList=new listChucVu();