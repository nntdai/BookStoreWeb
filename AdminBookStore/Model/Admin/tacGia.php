<?php
include_once('Model/Database.php');
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