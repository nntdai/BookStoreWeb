<?php
include_once ('C:/xampp/htdocs/AdminBookStore/Model/Database.php');
// include_once './Model/Database.php';
class HinhThucModel extends Database{
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}

	public function ListHinhThuc()
	{
		$sql = "SELECT * From hinhthuc";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
        return $list;

	
}
}