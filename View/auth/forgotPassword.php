<?php

    //chua xong


    session_start();
    include_once("Model/AccountModel.php");
    if(!isset($_SESSION["step"]))  $_SESSION["step"] = 1;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        switch($_SESSION["step"]) {
            case 1:
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["step"] = 2;
                break;
            case 2:
                $_SESSION["otp"] = $_POST["otp"];
                $_SESSION["step"] = 3;
                break;
            case 3:
                if ($_POST["password"] == $_POST["repassword"]) {
                    $password = $_POST["password"];
                    // update password in database
                    $_SESSION["step"] = 4;
                }
                break;
        }
    }
?>
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
	</style>
  </head>
<body class="text-center">
    
	<main>
        <img class="mb-4" src="../Image/iconBookStore.png" alt="" height="160">
		<form action="View/auth/forgotPassword.php" method="post">
            <?php switch($_SESSION["step"]) {
                case 1: ?>
                    <label for="username" class="form-label">Vui lòng nhập tên đăng nhập</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
                    <?php break;
                case 2: ?>
                    <label for="otp" class="form-label">Vui lòng nhập mã OTP</label>
                    <input type="text" class="form-control" name="otp" placeholder="OTP" required>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
                    <?php break;
                case 3: ?>
                    <label for="password" class="form-label">Nhập mật khẩu mới</label>
                    <input type="password" class="form-control" name="password" placeholder="New password" required>
                    <label for="repassword" class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="repassword" placeholder="Re-enter new password" required>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
                    <?php break;
            } ?>
		</form>

        <p class="mt-3 mb-3 text-muted">&copy; SGU 2024</p>
	</main>

</body>
</html>