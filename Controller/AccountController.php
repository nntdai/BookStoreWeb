<?php

//dung de hien thi danh sach tai khoan, thong tin tai khoan, dang ki, dang nhap, dang xuat, quen mat khau, gui OTP, kiem tra OTP


include_once("Model/AccountModel.php");  

class AccountController {
    public function get() {
        if(isset($_GET["acid"])) {
            $modelAccount = new AccountModel();
            $account = $modelAccount->getAccountDetail($_GET["acid"]);

            include_once("View/account/detail.php");
        }
        else {
            $modelAccount = new AccountModel();
            $accountList = $modelAccount->getAllAccount();

            include_once("View/account/index.php");
        }
    }

    public function post() {
        if(isset($_POST["action"])) {
            switch ($_POST["action"]) {
                case "add":
                    //chua check quyen
                    $modelAccount = new AccountModel();
                    $json = $modelAccount->createAccount($_POST["username"], $_POST["email"], $_POST["password"], $_POST["role"], $_POST["status"], $_POST["sdt"], $_POST["hoTen"]);
                    echo json_encode($json);
                    break;
                case "update":
                    //chua check quyen
                    $modelAccount = new AccountModel();
                    $json = $modelAccount->updateAccount($_POST["acid"], $_POST["username"], $_POST["password"], $_POST["email"], $_POST["role"], $_POST["status"], $_POST["sdt"], $_POST["hoTen"]);
                    echo json_encode($json);
                    break;
                case "delete":
                    //chua check quyen
                    $modelAccount = new AccountModel();
                    $json = $modelAccount->deleteAccount($_POST["acid"]);
                    echo json_encode($json);
                    break;
                case "detail":
                    $modelAccount = new AccountModel();
                    $json = $modelAccount->getAccountDetail($_POST["acid"]);
                    echo json_encode($json);
                    break;
                case "login":
                    $this->login();
                    break;
                case "register":
                    $this->register();
                    break;
                case "logout":
                    $this->logout();
                    break;
                case "resetPassword":
                    $this->resetPassword();
                    break;
                case "sendOTP":
                    $this->sendOTP();
                    break;
                case "get":
                    $modelAccount = new AccountModel();
                    $accountList = $modelAccount->getAllAccount();
                    include_once("View/account/index.php");
                    break;
                default:
                    break;
            }
        }
        die(); //dung de ket thuc chuong trinh
    }

    public function script() {
        echo "<script src='js/account.js'></script>";
    }

    public function login() {
        // Xử lý đăng nhập
        $AccountModel = new AccountModel();
        $result = $AccountModel->getAccount($_POST["username"], $_POST["pwd"]);
        if ($result) {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["maVaiTro"] = $result->roleId;
            $_SESSION["allowedToAccessAdminPage"] = $AccountModel->checkAdminPageAccess()? 1 : 0;
            $_SESSION["logined"] = true;
            echo json_encode(array("status" => "success", "allowedToAccessAdminPage" => $_SESSION["allowedToAccessAdminPage"]));
        } else {
            echo json_encode(array("status" => "fail", "message" => "Username or password is incorrect"));
        }
    }

    public function register() {
        $error = $this->validateRegister();
        if ($error) {
            echo json_encode(array("status" => "fail", "message" => $error));
            return;
        }
        // Xử lý đăng ký
        $AccountModel = new AccountModel();
        $result = $AccountModel->createAccount($_POST["username"], $_POST["pwd1"], $_POST["email"], 2, 1, $_POST["sdt"], $_POST["hoTen"]);
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
        unset($_SESSION["username"]);
        unset($_SESSION["maVaiTro"]);
        unset($_SESSION["allowedToAccessAdminPage"]);
    }

    public function resetPassword() { // Xử lý quên mật khẩu
        //validate
        if (!isset($_POST["username"]) ) {
            echo json_encode(array("status" => "fail", "message" => "Empty username"));
            return;
        }
        if(empty($_POST["password"])) {
            echo json_encode(array("status" => "fail", "message" => "Empty password"));
            return;
        }
        if($_POST["password"] != $_POST["repassword"]) {
            echo json_encode(array("status" => "fail", "message" => "Password not match"));
            return;
        }
        if(!isset($_POST["otp"])) {
            echo json_encode(array("status" => "fail", "message" => "Empty OTP"));
            return;
        }
        
        if($this->checkOTP($_POST["username"], $_POST["otp"])) {
            //Reset password
            $AccountModel = new AccountModel();
            $result = $AccountModel->resetPassword($_POST["username"], $_POST["password"]);
            if ($result) {
                echo json_encode(array("status" => "success"));
            } else {
                echo json_encode(array("status" => "fail", "message" => "Reset password fail"));
            }
        } else {
            echo json_encode(array("status" => "fail", "message" => "Invalid OTP"));
        }
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

    public function sendOTP() {
        if (!isset($_POST["username"])) {
            echo json_encode(array("status" => "fail", "message" => "Empty username"));
            return;
        }
        $username = $_POST["username"];
        //kiem tra username co ton tai khong
        $AccountModel = new AccountModel();
        $result = $AccountModel->checkUsernameExist($username);
        if (!$result) {
            echo json_encode(array("status" => "fail", "message" => "Username not exist"));
            return;
        }
        //Gửi mã OTP
        $result = $AccountModel->setAndSendOTP($username, 5);
        if ($result) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "fail", "message" => "Send OTP fail"));
        }
    }

    public function checkOTP($username, $otp) {
        //Kiểm tra mã OTP
        $AccountModel = new AccountModel();
        $result = $AccountModel->checkOTP($username, $otp);
        return $result;
    }
}


?>