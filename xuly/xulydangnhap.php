<?php
    session_start();
    require_once("../util/DatabaseConnection.php");
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $status  = "fail";
    $message = "";
    $allowedToAccessAdminPage = 0;
    $_SESSION["allowedToAccessAdminPage"] = 0;
    if($username == "" || $pwd == "") {
        $status = "error";
        $message = "Empty field";
    }
    else try {
        //dung prepared statement de chong sql injection
        
        $conn = DatabaseConnection::getInstance();
        $sql = "SELECT * FROM `taikhoan` WHERE tendangnhap = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $query = $stmt->get_result();
        $stmt->close();
        if($query -> num_rows > 0) 
        {
            $row = mysqli_fetch_assoc($query);
            if($row["matkhau"] == $pwd) {
                $status = "success";
                $message = "Login success";

                //luu thong tin tai khoan vao session
                $_SESSION["tendangnhap"] = $username;
                $_SESSION["matk"] = $row["matk"];
                $_SESSION["maVaiTro"] = $row["maVaiTro"];

                //kiem tra tai khoan co quyen vao trang admin hay khong
                $getQuyenSql = "
                    SELECT * 
                    FROM `vaitro_chucnang` 
                    WHERE maVaiTro = '" . $row["maVaiTro"] . "'
                ";
                $query = $conn->query($getQuyenSql);
                if ($query->num_rows > 0) {
                    $allowedToAccessAdminPage = 1;
                    $_SESSION["allowedToAccessAdminPage"] = 1;
                }
            }
            else {
                $status = "error";
                $message = "Wrong password";
            }
        }
        else {
            $status = "error";
            $message = "Username not found";
        }
    } catch (Exception $e) {
        $status = "error";
        $message = "Error: " . $e;
    }
    echo json_encode(array("status" => $status, "message" => $message, "allowedToAccessAdminPage" => $allowedToAccessAdminPage));
?>