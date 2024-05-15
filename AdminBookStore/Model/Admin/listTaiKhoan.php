<?php
    include_once("C:/xampp/htdocs/AdminBookStore/Model/Database.php");
    class TaiKhoanModel extends Database{
        protected $db;
        public function __construct(){
            $this->db=new Database();
            $this->db->connect();
        }
        public function get_all(){
            $sql="SELECT taikhoan.*, chucvu.ten FROM taikhoan, chucvu WHERE taikhoan.idChucVu=chucvu.id";
            $rs=$this->db->conn->query($sql);
            $list=array();
            while($data=$rs->fetch_array()){
                $list[]=$data;
            }
            return $list;
        }
        public function addAccount($Phone, $Email, $Name, $Password, $id){
            $sql="INSERT INTO taikhoan (soDienThoai, email, hoTen, mauKhau, idChucVu, status) VALUES ('$Phone','$Email','$Name','$Password','$id','1')";
            if(mysqli_query($this->db->conn,$sql)){
                return true;
            }
            return false;    
        }
        public function updateAccount($Phone, $Email, $Name, $Password, $id){
            $sql= "UPDATE taikhoan SET email='$Email', hoTen='$Name', mauKhau='$Password', idChucVu='$id' WHERE soDienThoai='$Phone'";
            if(mysqli_query($this->db->conn,$sql)){
                return true;
            }
            return false;
        }
        public function deleteAccount($Phone){
            $sql= "UPDATE taikhoan SET status='0' WHERE soDienThoai='$Phone'";
            if(mysqli_query($this->db->conn,$sql)){
                return true;
            }
            return false;
        }
        public function getByPhone($Phone){
            $sql="SELECT taikhoan.*, chucvu.ten FROM taikhoan, chucvu WHERE taikhoan.idChucVu=chucvu.id and soDienThoai='$Phone'";
            $rs=$this->db->conn->query($sql);
            if($rs->num_rows > 0){
                return $rs->fetch_assoc();
            }
            return null;
        }
        public function getByChucVu($ChucVu){
            $sql="SELECT taikhoan.*, chucvu.ten FROM taikhoan, chucvu WHERE taikhoan.idChucVu=chucvu.id and taikhoan.idChucVu='$ChucVu'";
            $rs=$this->db->conn->query($sql);
            $list=array();
            while($data=$rs->fetch_array()){
                $list[]=$data;
            }
            return $list;
        }
        public function getByName($Name){
            $sql="SELECT taikhoan.*, chucvu.ten FROM taikhoan, chucvu WHERE taikhoan.idChucVu=chucvu.id and taikhoan.hoTen LIKE N'%".$Name."%'";
            $rs=$this->db->conn->query($sql);
            $list=array();
            while($data=$rs->fetch_array()){
                $list[]=$data;
            }
            return $list;
        }
        public function getByEmail($mail){
            $sql="SELECT taikhoan.*, chucvu.ten FROM taikhoan, chucvu WHERE taikhoan.idChucVu=chucvu.id and taikhoan.email LIKE N'%".$mail."%'";
            $rs=$this->db->conn->query($sql);
            $list=array();
            while($data=$rs->fetch_array()){
                $list[]=$data;
            }
            return $list;
        }
        public function getByPhone_Search($Phone){
            $sql="SELECT taikhoan.*, chucvu.ten FROM taikhoan, chucvu WHERE taikhoan.idChucVu=chucvu.id and soDienThoai LIKE N'%".$Phone."%'";
            $rs=$this->db->conn->query($sql);
            if($rs->num_rows > 0){
                return $rs->fetch_assoc();
            }
            return null;
        }
        public function Login($username)
	{
		$sql = "SELECT * FROM taikhoan,chucvu where taikhoan.idChucVu=chucvu.id and soDienThoai='".$username."'";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
        if (empty($list))
            return null;
        return $list[0];
    }
    }