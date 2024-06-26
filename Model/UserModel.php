<?php
    include_once("EntityUser.php");
    include_once("./util/DatabaseConnection.php");
    class UserModel {
        public function getUser($username, $password) {
            $sql = "SELECT * FROM taikhoan WHERE tendangnhap = '$username' AND matkhau = '$password' AND trangthai != 0 LIMIT 1";
            $result = DatabaseConnection::getInstance()->query($sql);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                return new EntityUser($row["matk"], $row["tendangnhap"], $row["matkhau"], $row["email"], 
                                        $row["maVaiTro"], $row["trangthai"], $row["sdt"], $row["hoTen"]);
            }
            return null;
        }

        public function createUser($username, $password, $email, $role, $status, $phone, $fullName) {
            $sql = "INSERT INTO taikhoan (tendangnhap, matkhau, email, vaitro, trangthai, sdt, hoTen) VALUES ('$username', '$password', '$email', '$role', '$status', '$phone', '$fullName')";
            $result = DatabaseConnection::getInstance()->query($sql);
            if ($result) {
                return true;
            }
            return false;
        }

        public function updateUser($id, $username, $password, $email, $role, $status, $phone, $fullName) {
            $sql = "UPDATE taikhoan SET tendangnhap = '$username', matkhau = '$password', email = '$email', vaitro = '$role', trangthai = '$status', sdt = '$phone', hoTen = '$fullName' WHERE matk = $id";
            $result = DatabaseConnection::getInstance()->query($sql);
            if ($result) {
                return true;
            }
            return false;
        }

        public function deleteUser($id) {
            $sql = "DELETE FROM taikhoan WHERE matk = $id";
            $result = DatabaseConnection::getInstance()->query($sql);
            if ($result) {
                return true;
            }
            return false;
        }

        public function resetPassword($id, $password) {
            $sql = "UPDATE taikhoan SET matkhau = '$password' WHERE matk = $id";
            $result = DatabaseConnection::getInstance()->query($sql);
            if ($result) {
                return true;
            }
            return false;
        }

        public function sendOTP($username, $otp_expiry) {
            $sql = "SELECT email FROM taikhoan WHERE tendangnhap = '{$username}' LIMIT 1";
            $result = DatabaseConnection::getInstance()->query($sql);
            if ($result->num_rows == 0) {
                return false;
            }
            $email =  mysqli_fetch_assoc($result)["email"];
            $otp = rand(100000, 999999);
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
    
        public function checkOTP($username, $otp) {
            $sql = "SELECT * FROM taikhoan WHERE otp = '$otp' AND otp_expiry > NOW() AND tendangnhap = '{$username}'";
            $result = DatabaseConnection::getInstance()->query($sql);
            if ($result->num_rows > 0) {
                return true;
            }
            return false;
        }

        public function checkAdminPageAccess() {
            //neu username co trong bang vaitro_chucnang thi co quyen vao trang admin
            $sql = "SELECT * FROM vaitro_chucnang WHERE maVaiTro = '" . $_SESSION["maVaiTro"] . "'";
            $result = DatabaseConnection::getInstance()->query($sql);
            if ($result->num_rows > 0) {
                return true;
            }
            return false;
        }
    }
?>