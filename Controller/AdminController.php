<?php

class AdminController {
    public function get() {
        if(isset($_SESSION["logined"]) && ($_SESSION["allowedToAccessAdminPage"] == 1)) {
            include_once("View/admin/index.php");
        }
        else if(isset($_SESSION["logined"]) && ($_SESSION["allowedToAccessAdminPage"] == 0)) {
            echo "<h2>Ban khong co quyen truy cap trang nay</h2><br>";
            echo "<a href='admin.php'>Quay lai trang chu</a><br>";
            echo "<a href='login.php'>Dang xuat</a><br>";
            die();
        }
        else {
            include_once("login.php");
            die();
        }
    }

    public function post() {
        if(isset($_SESSION["username"]) && ($_SESSION["allowedToAccessAdminPage"] == 1)) {
            // include_once("View/admin/index.php");
        }
        else if(isset($_SESSION["username"]) && ($_SESSION["allowedToAccessAdminPage"] == 0)) {
            // echo "<h2>Ban khong co quyen truy cap trang nay</h2><br>";
            // echo "<a href='admin.php'>Quay lai trang chu</a><br>";
            // echo "<a href='login.php'>Dang xuat</a><br>";
            // die();
        }
        else {
            // echo "Ban chua dang nhap.";
            // header("Location: login.html");
            // die();
        }
    }
}
?>