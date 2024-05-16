<?php 
class Entity_Account {
    public $soDienThoai;
    public $matKhau;
    public $email;
    public $hoTen;
    public $idChucVu;
    public $status;

    public function __construct($soDienThoai, $matKhau, $email, $hoTen, $idChucVu, $status) {
        $this->soDienThoai = $soDienThoai;
        $this->matKhau = $matKhau;
        $this->email = $email;
        $this->hoTen = $hoTen;
        $this->idChucVu = $idChucVu;
        $this->status = $status;
    }

}

?>