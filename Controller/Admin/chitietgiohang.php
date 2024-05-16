<?php
    include_once "C:/xampp/htdocs/BookStoreWeb/Model/Admin/chitietgiohang.php";
    class CTGiohang_list{
        private $CTgiohang_Model;
        public function __construct(){
            $this->CTgiohang_Model=new chitietgiohang_Model();
        }
        public function get_all(){
            return $this->CTgiohang_Model->get_all();
        }
        public function getById($id){
            $CTgiohang_Model=new chitietgiohang_Model();
            $CTgiohang=$CTgiohang_Model->getById($id);
            return $CTgiohang;
        }
    }
?>