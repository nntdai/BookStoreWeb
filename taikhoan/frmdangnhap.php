
<!-- Modal -->
<div class="modal fade" id="frmDangnhapModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header frmHeader">
        <h5 class="modal-title mx-auto">Đăng nhập</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close";></button>
      </div>
      
      <div class="modal-body">
        <form action="./pages/xulydangnhap.php" id="frmDangnhap" method="POST" class="mb-3">
            <div class="mb-3">
                <label for="usernameDangnhap" class="form-label">Username or id: </label>
                <input type="input" class="form-control" id="usernameDangnhap" name="username">
            </div>
            <div class="mb-3">
                <label for="pwdInput" class="form-label">Password: </label>
                <input type="password" class="form-control" id="pwdInput" name="pwd" autocomplete="test" >
            </div>
        </form>
        <div class="other-actions d-flex flex-column align-items-center mb-3">
            <button type="submit" class="btn submitBtn mb-3" form="frmDangnhap">Đăng nhập</button>
            <a class="row" href="" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#frmQuenMatkhau">Quên mật khẩu?</a>
            <span>Bạn chưa có tài khoản?</span>
            <a class="row" href="" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#frmDangkiModal">Đăng kí ngay</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        
    });
</script>
