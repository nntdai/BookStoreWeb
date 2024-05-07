<?php
include_once('Model/Database.php');
class TheLoaiModel extends Database{
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}

	public function ListTheLoai()
	{
		$sql = "SELECT * From theloai";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
        return $list;

	
}
}