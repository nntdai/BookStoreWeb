<?php
include_once ('C:/xampp/htdocs/BookStoreWeb/Model/Database.php');
// include_once './Model/Database.php';
class ChuDeModel extends Database{
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}

	public function addChuDe($name)
	{	
		$this->db->conn->real_escape_string($name);
		$sql = "INSERT INTO chude (tenChuDe)
							VALUES ('$name')";
		$this->db->conn->query($sql);
	}
	public function ListChuDe()
	{
		$sql = "SELECT * FROM chude ";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}

		return $list;
	}
	
}