<?php
    include_once("C:/xampp/htdocs/AdminBookStore/Model/Admin/giohang.php");
    class Giohang_list{
        private $Giohang_Model;
        public function __construct(){
            $this->Giohang_Model=new giohang_Model();
        }
        public function get_all(){
            return $this->Giohang_Model->get_all();
        }
    }
?>