<?php
include_once './Database.php';
class BookModel extends Database{
	protected $db;
    
	public function __construct()
	{
		$this->db = new Database();
		$this->db->connect();
	}
public function BookList()
	{
		$sql = "SELECT sach.*,tacgia.hoTen,nhaxuatban.tenNXB,hinhthuc.ten,theloai.tenTheLoai from sach,tacgia,tacgia_sach,nhaxuatban,hinhthuc,theloai where tacgia_sach.idSach =sach.id and tacgia_sach.idTacGia=tacgia.id and nhaxuatban.id=sach.idNXB and hinhthuc.id=sach.idHinhThuc and theloai.id=sach.idTheLoai and sach.status=1";
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}

		return $list;
	}
	public function getBook($id)
	{
		$sql = "SELECT sach.*,tacgia.hoTen,nhaxuatban.tenNXB,hinhthuc.ten,theloai.tenTheLoai,ngonngu.tenNgonNgu from sach,tacgia,tacgia_sach,nhaxuatban,hinhthuc,theloai,ngonngu where tacgia_sach.idSach =sach.id and tacgia_sach.idTacGia=tacgia.id and nhaxuatban.id=sach.idNXB and hinhthuc.id=sach.idHinhThuc and theloai.id=sach.idTheLoai and sach.status=1 and ngonngu.id=sach.idNgonNgu and sach.id=".$id;
		$result = $this->db->conn->query($sql);
		$list = array();
		while ($data = $result->fetch_array()) {
			$list[] = $data;
		}

		return $list[0];
	}
	public function addBook($idSach, $tenSach,$tenTacGia , $tenTheLoai ,$nguoiDich,$moTa, $tenNXB,$tenNgonNgu, $tenHinhThuc, $namXB,$giaGoc,$khuyenMai,$soLuongTong,$soTrang,$trongLuong,$kichThuoc)
	{	
		$sql = "INSERT INTO sach (id,ten,idTheLoai,idNXB,namXB,tenNguoiDich,idNgonNgu,giagoc,phanTramKhuyenMai,soTrang,idHinhThuc,trongLuong,kichThuocBaoBi,moTa,soLuongCon,soLuongDaBan,status)
							VALUES ('$idSach', '$tenSach', $tenTheLoai , $tenNXB, '$namXB-01-01','$nguoiDich',$tenNgonNgu, $giaGoc,$khuyenMai,$soTrang,$tenHinhThuc,$trongLuong,'$kichThuoc','$moTa',$soLuongTong,0,1)";
		$this->db->conn->query($sql);
		return $sql;
	}
	public function updateBook($idSach, $tenSach,$tenTacGia , $tenTheLoai ,$nguoiDich,$moTa, $tenNXB,$tenNgonNgu, $tenHinhThuc, $namXB,$giaGoc,$khuyenMai,$soLuongTong,$soTrang,$trongLuong,$kichThuoc)
	{	
		$sql = "update sach set ten='".$tenSach."',idTheLoai=".$tenTheLoai.",idNXB=".$tenNXB.",namXB='".$namXB."-01-01'".",tenNguoiDich='".$nguoiDich."',idNgonNgu=".$tenNgonNgu.",giagoc=".$giaGoc.",phanTramKhuyenMai=".$khuyenMai.",soTrang=".$soTrang.",idHinhThuc=".$tenHinhThuc.",trongLuong=".$trongLuong.",kichThuocBaoBi='".$kichThuoc."',soLuongCon=".$soLuongTong.",moTa='".$moTa."' where id='".$idSach."'";
							
		$this->db->conn->query($sql);
		return $sql;
	}
	public function deleteBook($idSach)
	{
		$sql="update sach set status=0 where id='".$idSach."'";
		$this->db->conn->query($sql);
		return $sql;
	}
}