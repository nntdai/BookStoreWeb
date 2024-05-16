<?php
include_once ('C:/xampp/htdocs/BookStoreWeb/Model/Database.php');
// include_once './Model/Database.php';
class DanhMucModel extends Database{
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}

	public function ListDanhMuc()
	{
		$sql = "SELECT * From danhmuc";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
        return $list;

	
}
}