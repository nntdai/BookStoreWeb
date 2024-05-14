<?php
include_once ('C:/xampp/htdocs/AdminBookStore/Model/Database.php');
// include_once './Model/Database.php';
class NgonNguModel extends Database{
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}

	public function ListNgonNgu()
	{
		$sql = "SELECT * From ngonngu";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
        return $list;

	
}
}