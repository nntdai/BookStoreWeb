<?php
    include_once("C:/xampp/htdocs/AdminBookStore/Model/Database.php");
    class ChucVuModel extends Database{
        protected $db;
        public function __construct(){
            $this->db = new Database();
            $this->db->connect();
        }
        public function ChucVuList(){
            $sql="select * from chucvu";
            $result=$this->db->conn->query($sql);
            $list=array();
            while($data = $result->fetch_array()){
                $list[]=$data;
            }
            return $list;
        }
    }