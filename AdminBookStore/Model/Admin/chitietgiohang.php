<?php
    include_once "C:/xampp/htdocs/AdminBookStore/Model/Database.php";
    class chitietgiohang_Model extends Database{
        protected $db;
        public function __construct(){
            $this->db = new Database();
            $this->db->connect();
        }
        public function get_all(){
            $sql="SELECT * FROM chitietgiohang";
            $rs= $this->db->conn->query($sql);
            $list=array();
            while($data=$rs->fetch_array()){
                $list[]=$data;
            }
            return $list;
        }
        public function getById($id){
            $sql="SELECT * FROM chitietgiohang, sach, hinhanhsach, tacgia_sach, tacgia ,theloai WHERE chitietgiohang.idSach=sach.id and sach.id=hinhanhsach.idSach and sach.idTheLoai=theloai.id AND chitietgiohang.idGioHang='$id' and sach.id=tacgia_sach.idSach and tacgia_sach.idTacGia=tacgia.id GROUP BY hinhanhsach.idSach HAVING hinhanhsach.idSach > 1";
            $rs= $this->db->conn->query($sql);
            $list=array();
            while($data=$rs->fetch_array()){
                $list[]=$data;
            }
            return $list;
        }
    }
?>