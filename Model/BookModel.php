<?php
include_once("EntityBook.php");
include_once("./util/DatabaseConnection.php");
class BookModel {
    public function __construct()
    {}
    public function getAllBook() {
        $rs = array();
        $sql = "SELECT * FROM sach";
        $conn = DatabaseConnection::getInstance();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($rs, new EntityBook($row["maSach"], $row["tenSach"], $row["maTheLoai"], $row["soLuong"], $row["donGia"], $row["hinhAnh"]));
            }
        }
        return $rs;
    }
    public function getBookDetail($bookid) {
        $allBook = $this->getAllBook();
        foreach($allBook as $book) {
            if($book->maSach == $bookid) {
                return $book;
            }
        }
    }
    public function getBookByCategory($categoryid) {
        $rs = array();
        $sql = "SELECT * FROM sach WHERE maTheLoai = '$categoryid'";
        $conn = DatabaseConnection::getInstance();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($rs, new EntityBook($row["maSach"], $row["tenSach"], $row["maTheLoai"], $row["soLuong"], $row["donGia"], $row["hinhAnh"]));
            }
        }
        return $rs;
    }
    public function getBookByAuthor($authorid) {
        $rs = array();
        $sql = "SELECT * FROM sach WHERE maTacGia = '$authorid'";
        $conn = DatabaseConnection::getInstance();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($rs, new EntityBook($row["maSach"], $row["tenSach"], $row["maTheLoai"], $row["soLuong"], $row["donGia"], $row["hinhAnh"]));
            }
        }
        return $rs;
    }
    public function getBookByPublisher($publisherid) {
        $rs = array();
        $sql = "SELECT * FROM sach WHERE maNXB = '$publisherid'";
        $conn = DatabaseConnection::getInstance();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($rs, new EntityBook($row["maSach"], $row["tenSach"], $row["maTheLoai"], $row["soLuong"], $row["donGia"], $row["hinhAnh"]));
            }
        }
        return $rs;
    }
    public function getBookBySearch($search) {
        $rs = array();
        $sql = "SELECT * FROM sach WHERE tenSach LIKE '%$search%'";
        $conn = DatabaseConnection::getInstance();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($rs, new EntityBook($row["maSach"], $row["tenSach"], $row["maTheLoai"], $row["soLuong"], $row["donGia"], $row["hinhAnh"]));
            }
        }
        return $rs;
    }
    public function getBookByPage($page) {
        $rs = array();
        $ITEM_PER_PAGE = 8;
        $sql = "SELECT * FROM sach LIMIT $ITEM_PER_PAGE OFFSET ".($page-1)*$ITEM_PER_PAGE;
        $conn = DatabaseConnection::getInstance();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($rs, new EntityBook($row["maSach"], $row["tenSach"], $row["maTheLoai"], $row["soLuong"], $row["donGia"], $row["hinhAnh"]));
            }
        }
        return $rs;
    }
}
?>