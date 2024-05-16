
<!-- Modal -->
<div class="modal" id="frmDangkiModal" tabindex="-1" aria-labelledby="frmLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header frmHeader">
        <h5 class="modal-title mx-auto frmLabel" >Đăng kí</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="frmDangki" method="post">
            <input type="hidden" name="controller" value="account">
            <input type="hidden" name="action" value="register">
            <div class="mb-3">
                <label for="soDienThoaiDangki" class="form-label">Số điện thoại <span class="text-danger">*</span> </label>
                <input type="input" class="form-control" id="soDienThoaiDangki" name="soDienThoai">
            </div>

            <div class="mb-3">
                <label for="tenkhachhang" class="form-label">Họ và tên <span class="text-danger">*</span></label>
                <input type="input" class="form-control" id="tenkhachhang" name="hoTen">
            </div>
            
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email <span class="text-danger">*</span> </label>
                <input type="email" class="form-control" id="emailInput" name="email">
            </div>

            <div class="mb-3">
                <label for="pwdInput1" class="form-label">Password <span class="text-danger">*</span> </label>
                <input type="password" class="form-control" id="pwdInput1" name="pwd1">
            </div>

            <div class="mb-3">
                <label for="pwdInput2" class="form-label">Nhập lại Password <span class="text-danger">*</span> </label>
                <input type="password" class="form-control" id="pwdInput2" name="pwd2">
            </div>
        </form>
        <div id="response"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <input type="button" class="btn submitBtn" value="Đăng kí" id="requestDangki">
      </div>
    </div>
  </div>
</div>
