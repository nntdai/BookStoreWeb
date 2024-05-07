<?php
include_once('Model/Database.php');
class BookModel extends Database{
	protected $db;
    
	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}
public function BookList()
	{
		$sql = "SELECT sach.*,tacgia.hoTen,nhaxuatban.tenNXB,hinhthuc.ten,theloai.tenTheLoai from sach,tacgia,tacgia_sach,nhaxuatban,hinhthuc,theloai where tacgia_sach.idSach =sach.id and tacgia_sach.idTacGia=tacgia.id and nhaxuatban.id=sach.idNXB and hinhthuc.id=sach.idHinhThuc and theloai.id=sach.idTheLoai";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}

		return $list;
	}
	public function addBook($name,)
	{	
		$sql = "INSERT INTO sach ()
							VALUES ()";
		$this->db->conn->query($sql);
	}
}