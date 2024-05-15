$(document).ready(function() {
    //xu ly form thong tin tai khoan
    $("#frm_thongTinTaiKhoan").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            url: "index.php?controller=account&action=update",
            type: "POST",
            data: $("#frm_thongTinTaiKhoan").serialize(),
            success: function(response) {
                try {
                    let data = JSON.parse(response);
                    if (data.status == "success") {
                        alert("Cập nhật thông tin tài khoản thành công!");
                        location.reload();
                    } else {
                        console.log(data.message);
                    }
                }
                catch (e) {
                    console.log(response);
                }
            }
        });
    });
});