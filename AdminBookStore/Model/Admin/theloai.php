<?php
include_once ('C:/xampp/htdocs/AdminBookStore/Model/Database.php');
// include_once './Model/Database.php';
class TheLoaiModel extends Database{
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}

	public function ListTheLoai()
	{
		$sql = "select theloai.id,theloai.tenTheLoai,danhmuc.tenDanhMuc,chude.tenChuDe from theloai,danhmuc,chude where theloai.idChuDe=chude.id and danhmuc.id=chude.id";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}
        return $list;

	
}
}