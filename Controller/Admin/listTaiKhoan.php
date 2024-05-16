<?php
    include_once("C:/xampp/htdocs/BookStoreWeb/Model/Admin/listTaiKhoan.php");
    include_once("C:/xampp/htdocs/BookStoreWeb/Model/Admin/listchucvu.php");
    class listTaiKhoan{
        private $TaiKhoan_Model;
        private $ChucVu_Model;
        public function __construct(){
            $this->TaiKhoan_Model=new TaiKhoanModel();
            $this->ChucVu_Model=new ChucVuModel();
        }
        public function get_all_account(){
            return $this->TaiKhoan_Model->get_all();
        }
        public function get_all_Chucvu(){
            return $this->ChucVu_Model->ChucVuList();
        }
        public function add_TaiKhoan($Phone, $email, $name, $Pass, $id){
            return $this->TaiKhoan_Model->addAccount($Phone, $email, $name, $Pass, $id);
        }
        public function edit_TaiKhoan($Phone, $Email, $name, $Pass, $id){
            return $this->TaiKhoan_Model->updateAccount($Phone, $Email, $name, $Pass, $id);
        }
        public function getByPhone($Phone){
            return $this->TaiKhoan_Model->getByPhone($Phone);
        }
        public function DeleteAccount($Phone){
            return $this->TaiKhoan_Model->deleteAccount($Phone);
        }
        public function getByChucVu($ChucVu){
            return $this->TaiKhoan_Model->getByChucVu($ChucVu);
        }
        public function getName($name){
            return $this->TaiKhoan_Model->getByName($name);
        }
        public function getMail($Mail){
            echo "<script>alert('$Mail')</script>";
            return $this->TaiKhoan_Model->getByEmail($Mail);
        }
        public function getPhoneSearch($Phone){
            return $this->TaiKhoan_Model->getByPhone_Search($Phone);
        }
        public function getName_cv($name, $id){
            return $this->TaiKhoan_Model->getByName_CV($name, $id);
        }
        public function getMail_cv($Mail, $id){
            return $this->TaiKhoan_Model->getByEmail_CV($Mail, $id);
        }
        public function getPhoneSearch_cv($Phone, $id){
            return $this->TaiKhoan_Model->getByPhone_Search_CV($Phone, $id);
        }
    }
