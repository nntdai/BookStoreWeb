<?php
    include_once("Model/M_Account.php");  

    class AccountController {
        public function get() {
            if(isset($_GET["acid"])) {
                $modelAccount = new Model_Account();
                $account = $modelAccount->getAccountDetail($_GET["acid"]);

                include_once("View/AccountDetail.php");
            }
            else {
                $modelAccount = new Model_Account();
                $accountList = $modelAccount->getAllAccount();

                include_once("View/AccountList.php");
            }
        }

        public function post() {
            if(isset($_POST["action"])) {
                if($_POST["action"] == "add") {
                    $modelAccount = new Model_Account();
                    $json = $modelAccount->addAccount($_POST["username"], $_POST["email"], $_POST["password"], $_POST["role"], $_POST["status"]);
                    echo json_encode($json);
                }
                if($_POST["action"] == "update") {
                    $modelAccount = new Model_Account();
                    $json = $modelAccount->updateAccount($_POST["acid"], $_POST["username"], $_POST["email"], $_POST["role"], $_POST["status"]);
                    echo json_encode($json);
                }
                if($_POST["action"] == "delete") {
                    $modelAccount = new Model_Account();
                    $json = $modelAccount->deleteAccount($_POST["acid"]);
                    echo json_encode($json);
                }
                if($_POST["action"] == "detail") {
                    $modelAccount = new Model_Account();
                    $json = $modelAccount->getAccountDetail($_POST["acid"]);
                    echo json_encode($json);
                }
            }
        }

        public function script() {
            echo "<script src='js/account.js'></script>";
        }
    }

    
?>