<?php
include_once('Model/Database.php');
class HinhAnhModel extends Database{
	protected $db;
    
	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}
public function DanhSachHinhAnh($id)
	{
		$sql = "SELECT url FROM hinhanhsach WHERE hinhanhsach.idSach=$id";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}

		return $list;
	}
}