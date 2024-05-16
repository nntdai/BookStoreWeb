<?php
    include_once("C:/xampp/htdocs/AdminBookStore/Model/Database.php");
    class tinhtrangdonhang_Model extends Database{
        protected $db;
        public function __construct(){
            $this->db = new Database();
            $this->db->connect();
        }
        public function get_all(){
            $sql="SELECT * FROM tinhtrangdonhang";
            $rs= $this->db->conn->query($sql);
            $list=array();
            while($data=$rs->fetch_array()){
                $list[]=$data;
            }
            return $list;
        }
    }
?>