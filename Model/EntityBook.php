<?php
class EntityBook {
    public $maSach;
    public $tenSach;
    public $maTheLoai;
    public $soLuong;
    public $donGia;
    public $hinhAnh;

    public function __construct($maSach, $tenSach, $maTheLoai, $soLuong, $donGia, $hinhAnh) {
        $this->maSach = $maSach;
        $this->tenSach = $tenSach;
        $this->maTheLoai = $maTheLoai;
        $this->soLuong = $soLuong;
        $this->donGia = $donGia;
        $this->hinhAnh = $hinhAnh;
    }

}
?>