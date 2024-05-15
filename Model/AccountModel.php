<?php
include_once("EntityAccount.php");
/*class Entity_Account {
    private $phone;
    private $matKhau;
    private $email;
    private $hoTen;
    private $idChucVu;
    private $status;
*/

include_once("./util/DatabaseConnection.php");
class AccountModel {
    public function __construct()
    {}

    public function getAllAccount() {
        $rs = array();
        //truy xuat database
        $sql = "SELECT * FROM taikhoan";
        $conn = DatabaseConnection::getInstance();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($rs, new Entity_Account($row["soDienThoai"], $row["matKhau"], $row["email"], $row["hoTen"], $row["idChucVu"], $row["status"]));
            }
        }
        return $rs;
    }

    public function getAccountDetail($soDienThoai) {
        $allAccount = $this->getAllAccount();
        foreach($allAccount as $account) {
            if($account->soDienThoai == $soDienThoai) {
                return $account;
            }
        }
    }

    //dung cho dang nhap
    public function getAccount($soDienThoai, $matKhau) {
        $sql = "SELECT * FROM taikhoan WHERE soDienThoai = '$soDienThoai' AND matKhau = '$matKhau' AND status != 0 LIMIT 1";
        $result = DatabaseConnection::getInstance()->query($sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            return new Entity_Account($row["soDienThoai"], $row["matKhau"], $row["email"], $row["hoTen"], $row["idChucVu"], $row["status"]);
        }
        return null;
    }

    public function checkUsernameExist($soDienThoai) {
        $sql = "SELECT * FROM taikhoan WHERE soDienThoai = '$soDienThoai' LIMIT 1";
        $result = DatabaseConnection::getInstance()->query($sql);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function createAccount($soDienThoai, $matKhau, $email, $idChucVu, $status, $hoTen) {
        $sql = "INSERT INTO taikhoan(soDienThoai, matKhau, email, idChucVu, status, hoTen) VALUES ('$soDienThoai', '$matKhau', '$email', $idChucVu, $status, '$hoTen')";
        $result = DatabaseConnection::getInstance()->query($sql);
        if ($result) {
            return true;
        }
        return false;
    }

    public function updateAccount($soDienThoai, $fields) {
        $query = "UPDATE taikhoan SET ";

        foreach ($fields as $field => $value) {
            $query .= "`$field` = '$value', ";
        }

        // Remove the last comma and space
        $query = rtrim($query, ', ');
        
        $query .= " WHERE soDienThoai = $soDienThoai";

        // Execute the query with the parameters
        $result = DatabaseConnection::getInstance()->query($query);
        if ($result) {
            return true;
        }
        return false;
    }

    public function deleteAccount($soDienThoai) {
        $sql = "DELETE FROM taikhoan WHERE soDienThoai = '$soDienThoai'";
        $result = DatabaseConnection::getInstance()->query($sql);
        if ($result) {
            return true;
        }
        return false;
    }

    public function resetPassword($soDienThoai, $matKhau) {
        $sql = "UPDATE taikhoan SET matKhau = '$matKhau' WHERE soDienThoai = '$soDienThoai'";
        $result = DatabaseConnection::getInstance()->query($sql);
        if ($result) {
            return true;
        }
        return false;
    }

    public function sendOTP($soDienThoai, $otp, $otp_expiry) {
        $sql = "SELECT email FROM taikhoan WHERE soDienThoai = '{$soDienThoai}' LIMIT 1";
        $result = DatabaseConnection::getInstance()->query($sql);
        if ($result->num_rows == 0) {
            return false;
        }
        $email =  mysqli_fetch_assoc($result)["email"];
        //send OTP to email
        $subject = "Xin chao";
        $message = "
        <div style=\"font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2\">
            <div style=\"margin:50px auto;width:70%;padding:20px 0\">
                <div style=\"border-bottom:1px solid #eee\">
                    <a href=\"\" style=\"font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600\">My Company</a>
                </div>
                <p style=\"font-size:1.1em\">Hi,</p>
                <p>Here is OTP for <span style='color: red'>reset your password</span> of account with username: <span style='font-weight: bold'>$soDienThoai</span>. OTP is valid for $otp_expiry minutes</p>
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

    public function checkOTP($soDienThoai, $otp) {
        $sql = "SELECT * FROM taikhoan WHERE otp = '$otp' AND otp_expiry > NOW() AND soDienThoai = '{$soDienThoai}'";
        $result = DatabaseConnection::getInstance()->query($sql);
        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }

    public function setAndSendOTP($soDienThoai, $otp_expiry) {
        //generate OTP
        $otp = rand(100000, 999999);
        //save OTP and opt_expriry to database
        $sql = "UPDATE taikhoan SET otp = '$otp', otp_expiry = DATE_ADD(NOW(), INTERVAL $otp_expiry MINUTE) WHERE soDienThoai = '$soDienThoai'";
        $result = DatabaseConnection::getInstance()->query($sql);
        if (!$result) {
            return false;
        }
        return $this->sendOTP($soDienThoai, $otp, $otp_expiry);
    }
}
?>