<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Reset Password</title>

    
    <!-- Boostrap v5 -->
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- link jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	<style>
		html, body {
			height: 100%;
		}

		body {
			display: -ms-flexbox;
			display: -webkit-box;
			display: flex;
			-ms-flex-align: center;
			-ms-flex-pack: center;
			-webkit-box-align: center;
			align-items: center;
			-webkit-box-pack: center;
			justify-content: center;
			padding-top: 40px;
			padding-bottom: 40px;
			background-color: #f5f5f5;
		}

        #loading {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            background: rgba(0,0,0,0.3) url('Image/loading.gif') no-repeat center center;
            background-size: 10%;
        }
	</style>
  </head>
<body class="text-center">
    <div id="loading"></div>
	<main>
        <img class="mb-4" src="Image/iconBookStore.png" alt="" height="160" class="mb-1">
        <form id="form" class="text-start">
            <label for="username" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control mb-3" name="username" placeholder="Username" required>
            <label for="password" class="form-label">Nhập mật khẩu mới</label>
            <input type="password" class="form-control mb-3" name="password" placeholder="New password" required>
            <label for="repassword" class="form-label">Nhập lại mật khẩu</label>
            <input type="password" class="form-control mb-3" name="repassword" placeholder="Re-enter new password" required>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="OTP" name="otp">
                <button class="btn btn-outline-primary" id="btnSendOtp" type="button">Gửi OTP</button>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
        </form>
        <p class="mt-3 mb-3 text-muted">&copy; SGU 2024</p>
    </main>
    
    <script>
        $("#loading").hide();
        $(document).ajaxStart(function() {
            $("#loading").show();
        }).ajaxStop(function() {
            $("#loading").hide();
        });
        $(document).ready(function() {
            $("#form").submit(function(e) {
                e.preventDefault();
                
                $.ajax({
                    type: "POST",
                    url: "index.php",
                    //gui thong trong form va ten controller, action
                    data: $("#form").serialize() + "&controller=account&action=resetPassword",
                    success: function(response) {
                        try {
                            data = JSON.parse(response);
                            if (data["status"] == "success") {
                                alert("Reset password successfully, please close this tab and login again!");
                            } else {
                                alert(data["message"]);
                            }
                        } catch (error) {
                            alert("Error: " + response);
                        }
                    }
                });
            });

            //gui request lay OTP
            $("#btnSendOtp").click(function() {
                $.ajax({
                    type: "POST",
                    url: "index.php",
                    data: $("#form").serialize() + "&controller=account&action=sendOTP",
                    success: function(response) {
                        try {
                            data = JSON.parse(response);
                            if (data["status"] == "success") {
                                alert("OTP sent successfully");
                            } else {
                                alert("Error: "+data["message"]);
                            }
                        } catch (error) {
                            alert("Error: " + response);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>