<?php
include_once ('C:/xampp/htdocs/BookStoreWeb/Model/Database.php');
// include_once './Model/Database.php';
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

public function addNhaXuatBan($nxb)
{	
	$sql = "INSERT INTO nhaxuatban (tenNXB,status) VALUES ('$nxb',1)";
	$this->db->conn->query($sql);
}
public function getID()
{	
	$sql = "SELECT id FROM nhaxuatban ORDER BY id DESC LIMIT 1";
	$result = $this->db->conn->query($sql);
	$list = array();
	while ($data = $result->fetch_array()) {
		$list[] = $data;
	}
	return $list[0]['id'];
}
}