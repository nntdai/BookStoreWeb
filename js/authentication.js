$(document).ready(function(){
    // Xử lý đăng nhập
    $("#frmDangnhap").submit(function(e){
        e.preventDefault();
        console.log("loginning ...")
        $.ajax({
            url: "index.php",
            type: "post",
            data: $("#frmDangnhap").serialize(),
            success: function(response){
                try {
                    let data = JSON.parse(response);
                    
                    if (data.status == "success") {
                        if (data.allowedToAccessAdminPage == 1){
                            window.location.href = "admin.php";
                        }
                        else location.reload();
                    } else {
                        $("#statusLabel").text("Đăng nhập thất bại");
                        $("#statusMessage").text(data.message);
                        $("#statusModal").modal("show");
                    }
                } catch (e) {
                    $("#statusLabel").text("Lỗi hệ thống");
                    $("#statusMessage").text("Vui lòng thử lại sau");
                    $("#statusModal").modal("show");
                    console.log(response);

                }
            }
        });
    });

    // Xử lý đăng kí
    $('#requestDangki').on('click', function(e) {
      e.preventDefault();

      $.ajax({
        url: 'index.php',
        type: 'post',
        data: $("#frmDangki").serialize(),
        success: function(response) {
            let data = JSON.parse(response);
            if (data.status == "success") {
                $("#statusLabel").text("Thành công");
                $("#statusMessage").text("Đăng kí thành công");
                $("#statusModal").modal("show");
            } else {
                $("#statusLabel").text("Đăng kí thất bại");
                $("#statusMessage").text(data.message);
                $("#statusModal").modal("show");
            }
        }
      });
    });

    // Xử lý đăng xuất
    $('#btn_DangXuat').on('click', function(){
        $.ajax({
            url: 'index.php',
            type: 'post',
			//xac dinh controller va action
			data: {controller: 'account', action: 'logout'},
            success: function(response){
                location.reload();
            }
        });
    });
});