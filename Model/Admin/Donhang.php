<?php
    include_once("C:/xampp/htdocs/AdminBookStore/Model/Database.php");
    class Donhang_Model extends Database{
        protected $db;
        public function __construct(){
            $this->db = new Database();
            $this->db->connect();
        }
        public function get_all(){
            $sql="SELECT * , donhang.id as madon, giohang.id as magiohang, tinhtrangdonhang.id as matinhtrang, taikhoan.hoTen FROM donhang, giohang, tinhtrangdonhang, taikhoan WHERE donhang.idGioHang=giohang.id and donhang.idTinhTrang=tinhtrangdonhang.id and taikhoan.soDienThoai=giohang.soDienThoai";
            $rs= $this->db->conn->query($sql);
            $list=array();
            while($data=$rs->fetch_array()){
                $list[]=$data;
            }
            return $list;
        }
        public function get_by_id($id){
            $sql="SELECT * , donhang.id as madon, giohang.id as magiohang, tinhtrangdonhang.id as matinhtrang, taikhoan.hoTen FROM donhang, giohang, tinhtrangdonhang, taikhoan WHERE donhang.idGioHang=giohang.id and donhang.idTinhTrang=tinhtrangdonhang.id and taikhoan.soDienThoai=giohang.soDienThoai and donhang.id='$id'";
            $rs= $this->db->conn->query($sql);
            if($rs->num_rows> 0){
                return $rs->fetch_assoc();
            }else{
                return null;
            }
        }
        public function update_order($id, $stt, $day_done){
            $sql="UPDATE donhang SET idTinhTrang='$stt', ngayHoanThanhDonHang=$day_done WHERE id='$id'";
            if(mysqli_query($this->db->conn,$sql)){
                return true;
            }
            return false;
        }

    }
?>