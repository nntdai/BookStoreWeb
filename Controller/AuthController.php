<?php
require_once("Model/UserModel.php");
class AuthController  {
    public function get() {
        //lay code giao dien html

    }

    public function post() {
        //echo ra ket qua '.json' de xu ly ajax new can thiet
        $action = $_POST["action"];
        $this->$action(); //goi ham cung ten voi action
        die();
    }

    public function login() {
        // Xử lý đăng nhập
        $usermodel = new UserModel();
        $result = $usermodel->getUser($_POST["username"], $_POST["pwd"]);
        if ($result) {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["maVaiTro"] = $result->getRoleId();
            $_SESSION["allowedToAccessAdminPage"] = $usermodel->checkAdminPageAccess()? 1 : 0;
            echo json_encode(array("status" => "success", "allowedToAccessAdminPage" => $_SESSION["allowedToAccessAdminPage"]));
        } else {
            echo json_encode(array("status" => "fail"));
        }
    }

    public function register() {
        $error = $this->validateRegister();
        if ($error) {
            echo json_encode(array("status" => "fail", "message" => $error));
            return;
        }
        // Xử lý đăng ký
        $usermodel = new UserModel();
        $result = $usermodel->createUser($_POST["username"], $_POST["pwd1"], $_POST["email"], 2, 1, $_POST["sdt"], $_POST["hoTen"]);
        if ($result) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "fail", "message" => "Username existed"));
        }
    }

    public function validateRegister() {
        // Xử lý validate đăng ký
        $emailReg = "/\w{1,}@[A-z]{2,}\.[a-z]{2,}$/";
        $sdtReg = "/0[0-9]{9,10}/";
        $username = $_POST["username"];
        $pwd1 = $_POST["pwd1"];
        $pwd2 = $_POST["pwd2"];
        $email = $_POST["email"];
        $sdt = $_POST["sdt"];
        $message = "";
        if($username == "" || $pwd1 == "" || $pwd2 == "" || $email == "") {
            $message .= "Empty field;";
            $result = false;
        }
        else {
            if($pwd1 != $pwd2) {
                $message .= "Password not match;";
                $result = false;
            }
            if(preg_match($emailReg, $email) == false) {
                $message .= "Invalid email;";
                $result = false;
            }
            if(preg_match($sdtReg, $sdt) == false and $sdt != "") {
                $message .= "Invalid phone number;";
                $result = false;
            }
        }
        return $result;
    }

    public function logout() {
        // Xử lý đăng xuất
        session_destroy();
        header("Location: index.php");
    }

    public function forgotPassword() {
        // Xử lý quên mật khẩu

    }

    public function getModal() {
        // Lấy modal đăng nhập
    }

    public function getScriptModal() {
        // Lấy script cho modal đăng nhập
    }

    public function getPage() {
        //Lấy trang đăng nhập
    }

    public function getScriptPage() {
        //Lấy script cho trang đăng nhập
        echo "<script src='js/login.js'></script>";
    }

    public function sendOTP($username) {
        //Gửi mã OTP
        $usermodel = new UserModel();
        $result = $usermodel->sendOTP($username, 5);
        if ($result) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "fail"));
        }
    }

    public function checkOTP($username, $otp) {
        //Kiểm tra mã OTP
        $usermodel = new UserModel();
        $result = $usermodel->checkOTP($username, $otp);
        if ($result) {
            $_SESSION["username"] = $username;
            $_SESSION["otp_verified"] = true;
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "fail"));
        }
    }
}
?>