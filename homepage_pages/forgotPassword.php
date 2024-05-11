<?php


    //------------------------------------------
    //FILE nay de test chuc nang quen mat khau
    //------------------------------------------


    include_once("../util/DatabaseConnection.php");
    function sendOTP($email, $otp, $otp_expiry, $username) {
        //send OTP to email
        $subject = "Xin chao";
        $message = "
        <div style=\"font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2\">
            <div style=\"margin:50px auto;width:70%;padding:20px 0\">
                <div style=\"border-bottom:1px solid #eee\">
                    <a href=\"\" style=\"font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600\">My Company</a>
                </div>
                <p style=\"font-size:1.1em\">Hi,</p>
                <p>Here is OTP for <span style='color: red'>reset your password</span> of account with username: <span style='font-weight: bold'>$username</span>. OTP is valid for $otp_expiry minutes</p>
                <h2 style=\"background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;
                font-size: 24px;line-height: 50px;margin-top: 15px;margin-bottom: 15px; letter-spacing: 5px;
                \">$otp</h2>
                <p style=\"font-size:0.9em;\">Regards,<br />My Company</p>
                <hr style=\"border:none;border-top:1px solid #eee\" />
                <div style=\"float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300\">
                    <p>My Company Inc</p>
                    <p>1600 Amphitheatre Parkway</p>
                    <p>California</p>
                </div>
            </div>
        </div>";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <my.emailsender.demo@gmail.com">' . "\r\n";
        return mail($email, $subject, $message, $headers);
    }

    function checkOTP($otp, $username) {
        $sql = "SELECT * FROM taikhoan WHERE otp = '$otp' AND otp_expiry > NOW() AND tendangnhap = '{$username}'";
        $result = DatabaseConnection::getInstance()->query($sql);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    if (isset($_POST["username"]) && !isset($_POST["otp"])) {
        $username = $_POST["username"];
        //generate OTP
        $otp = rand(100000, 999999);
        //save OTP and opt_expriry to database
        $sql = "UPDATE taikhoan SET otp = '$otp', otp_expiry = DATE_ADD(NOW(), INTERVAL 5 MINUTE) WHERE tendangnhap = '$username'";
        $result = DatabaseConnection::getInstance()->query($sql);
        if (!$result) {
            echo "Username không tồn tại";
            return;
        }
        //get email from username
        $sql = "SELECT email FROM taikhoan WHERE tendangnhap = '{$username}' LIMIT 1";
        $result = DatabaseConnection::getInstance()->query($sql);
        if ($result->num_rows == 0) {
            echo "fail";
            die();
        }
        $row = mysqli_fetch_assoc($result);
        $email = $row["email"];
        if (sendOTP($email, $otp, 5, $username)) {
            $message = "Mã OTP đã được gửi đến email của bạn";
        }
        else {
            $message = "Gửi mã OTP thất bại";
        }
    }
    if (isset($_POST["username"]) && isset($_POST["otp"]) ) {
        $otp = $_POST["otp"];
        $username = $_POST["username"];
        if (checkOTP($_POST["otp"], $username)) {
            $_SESSION["otp_verified"] = true;
            header("Location: resetPassword.php");
        } else {
            $message = "Mã OTP không hợp lệ";
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
    <title>Forgot Password</title>

    
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
        <?php if(!isset($_POST["username"])) { ?>
            <form action="forgotPassword.php" method="post">
                <label for="username" class="form-label">Nhập Tên đăng nhập</label>
                <input type="text" id="username" name="username" class="form-control mb-3" placeholder="Tên đăng nhập" required autofocus>
                <input type="submit" class="w-100 btn btn-lg btn-primary" value="Gửi mã OTP">
            </form>
        <?php } else {?>
            <form action="forgotPassword.php" method="post">
                <input type="hidden" name="username" value="<?php echo $_POST["username"] ?>">
                <input type="text" id="otp" name="otp" class="form-control mb-3" placeholder="Nhập mã OTP" required>
                <input type="submit" class="w-100 btn btn-lg btn-primary" value="Xác nhận">
            </form>
        <?php } ?>
        <p class="mt-3 mb-3 text-muted">&copy; SGU 2024</p>
	</main>

	<script>
		$(document).ready(function(){
            <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                echo "alert('$message')";
            }
            ?>
		});
	</script>
</body>
</html>
