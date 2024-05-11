<?php
include_once("E_Account.php");
include_once("./util/DatabaseConnection.php");
class Model_Account {
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
                array_push($rs, new Entity_Account($row["matk"], $row["tendangnhap"], $row["email"], $row["matkhau"], $row["maVaiTro"], $row["trangthai"]));
            }
        }
        return $rs;
    }

    public function getAccountDetail($acid) {
        $allAccount = $this->getAllAccount();
        foreach($allAccount as $account) {
            if($account->id == $acid) {
                return $account;
            }
        }
    }

    public function addAccount($username, $email, $password, $role, $status) {
        $conn = DatabaseConnection::getInstance();
        //dung prepared statement de chong sql injection
        $sql = "INSERT INTO taikhoan (tendangnhap, email, matkhau, maVaiTro, trangthai) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $username, $email, $password, $role, $status);
        $json = array();
        try {
            $stmt->execute();
            $newAccount = new Entity_Account($conn->insert_id, $username, $email, $password, $role, $status);
            $json["newAccount"] = $newAccount;
        } catch (Exception $e) {
            $json["error"] = "Error SQL: $conn->error";
        }
        $stmt->close();
        return $json;
    }

    public function updateAccount($acid, $username, $email, $role, $status) {
        $conn = DatabaseConnection::getInstance();
        //dung prepared statement de chong sql injection
        $sql = "UPDATE taikhoan SET tendangnhap = ?, email = ?, maVaiTro = ?, trangthai = ? WHERE matk = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $username, $email, $role, $status, $acid);
        $json = array();
        try {
            $stmt->execute();
            $account = new Entity_Account($acid, $username, $email, "", $role, $status);
            $json["account"] = $account;
        } catch (Exception $e) {
            $json["error"] = "Error SQL: $conn->error";
        }
        $stmt->close();
        return $json;
    }

    public function deleteAccount($acid) {
        $conn = DatabaseConnection::getInstance();
        //dung prepared statement de chong sql injection
        $sql = "DELETE FROM taikhoan WHERE matk = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $acid);
        $json = array();
        try {
            $stmt->execute();
            $json["success"] = "Delete account success";
        } catch (Exception $e) {
            $json["error"] = "Error SQL: $conn->error";
        }
        $stmt->close();
        return $json;
    }
}
?>