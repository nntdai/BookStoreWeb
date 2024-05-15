<?php
    include_once("C:/xampp/htdocs/AdminBookStore/Model/Admin/Donhang.php");
    include_once("C:/xampp/htdocs/AdminBookStore/Model/Admin/giohang.php");
    include_once("C:/xampp/htdocs/AdminBookStore/Model/Admin/tinhtrangdonhang.php");

    class Donhang_list{
        private $Donhang_Model;
        private $Giohang_Model;
        private $tinhtrangdon_Model;
        public function __construct(){
            $this->Donhang_Model = new Donhang_Model();
            $this->Giohang_Model = new giohang_Model();
            $this->tinhtrangdon_Model = new tinhtrangdonhang_Model();
        }
        public function getAllDonhangList(){
            return $this->Donhang_Model->get_all();
        }
        public function getAllGiohangList(){
            return $this->Giohang_Model->get_all();
        }
        public function getAlltinhtrangdonList(){
            return $this->tinhtrangdon_Model->get_all();
        }
        public function getById($id){
            $Donhang_Model=new Donhang_Model();
            $DonHang=$Donhang_Model->get_by_id($id);
            return $DonHang;
        }
        public function update_order($id,$order, $day_done){
            $Donhang_Model=new Donhang_Model();
            $DonHang=$Donhang_Model->update_order($id, $order, $day_done);
            return $DonHang;
        }
    }
?>