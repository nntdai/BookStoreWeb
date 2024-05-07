<?php
include_once('Model/Database.php');
class NhaXuatBanModel extends Database{
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}

	public function ListNXB()
	{
		$sql = "SELECT * From nhaxuatban";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
        return $list;

	
}
}