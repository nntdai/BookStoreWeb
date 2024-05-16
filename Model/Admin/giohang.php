<?php
    include_once("C:/xampp/htdocs/BookStoreWeb/Model/Database.php");
    class giohang_Model extends Database{
        protected $db;
        public function __construct(){
            $this->db = new Database();
            $this->db->connect();
        }
        public function get_all(){
            $sql="SELECT * FROM giohang";
            $rs= $this->db->conn->query($sql);
            $list=array();
            while($data=$rs->fetch_array()){
                $list[]=$data;
            }
            return $list;
        }
    }
?>