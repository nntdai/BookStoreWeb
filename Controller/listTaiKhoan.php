<?php
    include_once("C:/xampp/htdocs/AdminBookStore/Model/Admin/listTaiKhoan.php");
    include_once("C:/xampp/htdocs/AdminBookStore/Model/Admin/listchucvu.php");
    class listTaiKhoan{
        public function __construct(){
            $TaiKhoan_Model=new TaiKhoanModel();
            $TaiKhoan=$TaiKhoan_Model->get_all();
            $ChucVu_Model=new ChucVuModel();
            $ChucVu=$ChucVu_Model->ChucVuList();
        }
        public function add_TaiKhoan($Phone, $email, $name, $Pass, $id){
            $TaiKhoan_Model=new TaiKhoanModel();
            $TaiKhoan=$TaiKhoan_Model->addAccount($Phone, $email, $name, $Pass, $id);
            return $TaiKhoan;
        }
        public function edit_TaiKhoan($Phone, $Email, $name, $Pass, $id){
            $TaiKhoan_Model=new TaiKhoanModel();
            $TaiKhoan=$TaiKhoan_Model->updateAccount($Phone, $Email, $name, $Pass, $id);
            return $TaiKhoan;
        }
        public function getByPhone($Phone){
            $TaiKhoan_Model=new TaiKhoanModel();
            $TaiKhoan=$TaiKhoan_Model->getByPhone($Phone);
            return $TaiKhoan;
        }
        public function DeleteAccount($Phone){
            $TaiKhoan_Model=new TaiKhoanModel();
            $TaiKhoan=$TaiKhoan_Model->deleteAccount($Phone);
            return $TaiKhoan;
        }
    }
    $TaiKhoanList=new listTaiKhoan();