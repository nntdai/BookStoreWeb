<?php

//dung de hien thi danh sach tai khoan, thong tin tai khoan, dang ki, dang nhap, dang xuat, quen mat khau, gui OTP, kiem tra OTP


include_once("Model/AccountModel.php");  

class AccountController {
    public function get() {
        //TODO: not check permission
        if(isset($_GET["soDienThoai"])) {
            $modelAccount = new AccountModel();
            $account = $modelAccount->getAccountDetail($_GET["soDienThoai"]);

            include_once("View/account/detail.php");
        }
        else {
            $modelAccount = new AccountModel();
            $accountList = $modelAccount->getAllAccount();

            include_once("View/account/index.php");
        }
    }

    public function post() {
        if(isset($_REQUEST["action"])) {
            switch ($_REQUEST["action"]) {
                case "add":
                    //TODO: not check permission
                    $modelAccount = new AccountModel();
                    try {
                        $result = $modelAccount->createAccount($_POST["soDienThoai"], $_POST["matKhau"], $_POST["email"], $_POST["idChucVu"], $_POST["status"], $_POST["hoTen"]);
                        echo json_encode(array("status" => "success"));
                    } catch (Exception $e) {
                        echo json_encode(array("status" => "fail", "message" => $e->getMessage()));
                    }
                    break;
                case "update":
                    //TODO: not check permission
                    $modelAccount = new AccountModel();
                    try {
                        $fields = array();
                        if(isset($_POST["matKhau"]) && $_POST["matKhau"] != "") {
                            $fields["matKhau"] = $_POST["matKhau"];
                        }
                        if(isset($_POST["email"]) && $_POST["email"] != "") {
                            $fields["email"] = $_POST["email"];
                        }
                        if(isset($_POST["idChucVu"]) && $_POST["idChucVu"] != "") {
                            $fields["idChucVu"] = $_POST["idChucVu"];
                        }
                        if(isset($_POST["status"]) && $_POST["status"] != "") {
                            $fields["status"] = $_POST["status"];
                        }
                        if(isset($_POST["hoTen"]) && $_POST["hoTen"] != "") {
                            $fields["hoTen"] = $_POST["hoTen"];
                        }
                        $result = $modelAccount->updateAccount($_POST["soDienThoai"], $fields);
                        echo json_encode(array("status" => "success"));
                    } catch (Exception $e) {
                        echo json_encode(array("status" => "fail", "message" => $e->getMessage()));
                    }
                    break;
                case "delete":
                    //TODO: not check permission
                    $modelAccount = new AccountModel();
                    try {
                        $result = $modelAccount->deleteAccount($_POST["soDienThoai"]);
                        echo json_encode(array("status" => "success"));
                    } catch (Exception $e) {
                        echo json_encode(array("status" => "fail", "message" => $e->getMessage()));
                    }
                    break;
                case "detail":
                    $modelAccount = new AccountModel();
                    try {
                        $account = $modelAccount->getAccountDetail($_POST["soDienThoai"]);
                        echo json_encode(array("status" => "success", "account" => $account));
                    } catch (Exception $e) {
                        echo json_encode(array("status" => "fail", "message" => $e->getMessage()));
                    }   
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
        $result = $AccountModel->getAccount($_POST["soDienThoai"], $_POST["pwd"]);
        if ($result) {
            // Lưu thông tin người dùng vào session
            $_SESSION["user"] = $result;
            $allowedToAccessAdminPage = $result->idChucVu != 4 ? 1 : 0;
            echo json_encode(array("status" => "success", "allowedToAccessAdminPage" => $allowedToAccessAdminPage));
        } else {
            echo json_encode(array("status" => "fail", "message" => "Phone numbers or password is incorrect"));
        }
    }

    public function register() {
        //kiem tra sdt co ton tai khong
        $AccountModel = new AccountModel();
        $result = $AccountModel->checkUsernameExist($_POST["soDienThoai"]);
        if ($result) {
            echo json_encode(array("status" => "fail", "message" => "Username existed"));
            return;
        }
        $error = $this->validateRegister();
        if ($error != "") {
            echo json_encode(array("status" => "fail", "message" => $error));
            return;
        }
        // Xử lý đăng ký
        $AccountModel = new AccountModel();
        $result = $AccountModel->createAccount($_POST["soDienThoai"], $_POST["pwd1"], $_POST["email"], 4, 1, $_POST["hoTen"]);
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
        $soDienThoai = $_POST["soDienThoai"];
        $pwd1 = $_POST["pwd1"];
        $pwd2 = $_POST["pwd2"];
        $email = $_POST["email"];
        $hoTen = $_POST["hoTen"];
        $message = "";

        if($pwd1 == "" || $email == "" || $hoTen == "") {
            $message .= "Empty field;";
        }
        else {
            if($pwd1 != $pwd2) {
                $message .= "Password not match;";
            }
            if(preg_match($sdtReg, $soDienThoai) == false) {
                $message .= "Invalid phone number;";
            }
            if(preg_match($emailReg, $email) == false) {
                $message .= "Invalid email;";
            }
        }
        return $message;
    }

    public function logout() {
        // Xử lý đăng xuất
        unset($_SESSION["user"]);
    }

    public function resetPassword() { // Xử lý quên mật khẩu
        //validate
        $sdtReg = "/0[0-9]{9,10}/";
        if (!preg_match($sdtReg, $_POST["soDienThoai"])) {
            echo json_encode(array("status" => "fail", "message" => "Invalid phone number"));
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
        
        if($this->checkOTP($_POST["soDienThoai"], $_POST["otp"])) {
            //Reset password
            $AccountModel = new AccountModel();
            $result = $AccountModel->resetPassword($_POST["soDienThoai"], $_POST["password"]);
            if ($result) {
                echo json_encode(array("status" => "success"));
            } else {
                echo json_encode(array("status" => "fail", "message" => "Reset password fail"));
            }
        } else {
            echo json_encode(array("status" => "fail", "message" => "Invalid OTP"));
        }
    }

    public function sendOTP() {
        //validate
        $sdtReg = "/0[0-9]{9,10}/";
        if (!preg_match($sdtReg, $_POST["soDienThoai"])) {
            echo json_encode(array("status" => "fail", "message" => "Invalid phone number"));
            return;
        }
        $soDienThoai = $_POST["soDienThoai"];
        //kiem tra sdt co ton tai khong
        $AccountModel = new AccountModel();
        $result = $AccountModel->checkUsernameExist($soDienThoai);
        if (!$result) {
            echo json_encode(array("status" => "fail", "message" => "Username not exist"));
            return;
        }
        //Gửi mã OTP
        $result = $AccountModel->setAndSendOTP($soDienThoai, 5);
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

    public function getAccountDetail($soDienThoai) {
        $AccountModel = new AccountModel();
        $result = $AccountModel->getAccountDetail($soDienThoai);
        return $result;
    }
}


?>