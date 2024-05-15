<?php
    $user = $_SESSION["user"];
?>
<div class="modal " id="thongtintaikhoan" tabindex="-1" aria-labelledby="thongtintaikhoanLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="thongtintaikhoanLabel">
                <i class="fa-regular fa-user"></i> Thông tin tài khoản</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frm_thongTinTaiKhoan">
                    <div class="mb-3 row">
                        <label for="soDienThoai" class="col-sm-3 col-form-label">Số điện thoại</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" name="soDienThoai" id="soDienThoai" value="<?= $user->soDienThoai?>"readonly >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="hoTen" class="col-sm-3 col-form-label">Họ tên</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="hoTen" id="hoTen" value="<?= $user->hoTen?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" id="email" value="<?= $user->email?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Đổi mât khẩu</label>
                        <div class="col-sm-9">
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" value="">
                                </div>
                                <input type="text" class="form-control" name="matKhau">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" form="frm_thongTinTaiKhoan" value="Lưu"></input>
            </div>
        </div>
    </div>
</div>