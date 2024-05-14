<?php
include_once ('C:/xampp/htdocs/AdminBookStore/Model/Database.php');
// include_once './Model/Database.php';
class TacGiaModel extends Database{
	protected $db;
    
	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}
public function ListTacGiaSach($id)
	{
		$sql = "SELECT sach.ten,tacgia.hoTen FROM tacgia_sach,sach,tacgia WHERE tacgia_sach.idSach=sach.id and tacgia_sach.idTacGia=tacgia.id and idSach=$id";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}

		return $list;
	}
	public function addTacGia($tenTacGia)
	{	
		$sql = "INSERT INTO tacgia (hoTen,status) VALUES ('$tenTacGia',1)";
		$this->db->conn->query($sql);
	}
	public function getID()
	{	
		$sql = "SELECT id FROM tacgia ORDER BY id DESC LIMIT 1";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
		return $list[0]['id'];
	}
	public function addTacGia_Sach($tenTacGia,$idSach)
	{	
		$sql = "INSERT INTO tacgia_sach (idSach,idTacGia,status) VALUES ('$idSach','$tenTacGia',1)";
		$this->db->conn->query($sql);
	}
	public function ListTacGia()
	{
		$sql = "SELECT * FROM tacgia ";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}

		return $list;
	}
}