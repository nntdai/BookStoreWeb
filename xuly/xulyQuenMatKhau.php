<?php
    //di den database de kiem tra email hoac so dien thoai co ton tai khong
    //neu ton tai thi gui email chua ma xac nhan
    //neu khong ton tai thi thong bao loi
    require_once("../util/DatabaseConnection.php");

    $email = $_POST["emailOrPhone"];
    $emailRegex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $phoneRegex = "/^0[0-9]{9,10}$/";
    if (preg_match($emailRegex, $email)) {
        $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
    }
    else if (preg_match($phoneRegex, $email)) {
        $sql = "SELECT * FROM taikhoan WHERE sdt = '$email'";
    }
    else {
        echo "Email hoac so dien thoai khong hop le";
        return;
    }
    //kiem tra email hoac so dien thoai co ton tai khong
    $result = DatabaseConnection::getInstance()->query($sql);
    if ($result->num_rows > 0) {
        //neu ton tai thi gui email chua ma xac nhan
        $row = mysqli_fetch_assoc($result);
        $subject = "Xac nhan quen mat khau";
        $message = '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
        <div style="margin:50px auto;width:70%;padding:20px 0">
          <div style="border-bottom:1px solid #eee">
            <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">My Company</a>
          </div>
          <p style="font-size:1.1em">Hi,</p>
          <p>Thank you for choosing My Company. Use the following OTP to complete your Sign Up procedures. OTP is valid for 5 minutes</p>
          <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">324457</h2>
          <p style="font-size:0.9em;">Regards,<br />My Company</p>
          <hr style="border:none;border-top:1px solid #eee" />
          <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
            <p>My Company Inc</p>
            <p>1600 Amphitheatre Parkway</p>
            <p>California</p>
          </div>
        </div>
      </div>';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <my.emailsender.demo@gmail.com">' . "\r\n";
        
        if(mail($email, $subject, $message, $headers)) {
            echo "Email da duoc gui";
        }
        else {
            echo "Email khong duoc gui";
        }
    }


?>