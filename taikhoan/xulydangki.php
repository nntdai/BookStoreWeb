<?php
    $emailReg = "/\w{1,}@[A-z]{2,}\.[a-z]{2,}$/";
    $sdtReg = "/0[0-9]{9,10}/";
    $username = $_POST["username"];
    $pwd1 = $_POST["pwd1"];
    $pwd2 = $_POST["pwd2"];
    $email = $_POST["email"];
    $sdt = $_POST["sdt"];
    
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "doanweb2";
    $conn = "";

    $conn = mysqli_connect($db_server, 
                           $db_user, 
                           $db_pass, 
                           $db_name);

    if($conn) {
        mysqli_query($conn, "SET NAMES 'utf8'");
        $sql = "select * from `taikhoan` where `tendangnhap`='{$username}'";
        try {
            $query = mysqli_query($conn, $sql);
            if(validate($query) == true) {
                $sql = "insert into `taikhoan`(`tendangnhap`, `matkhau`, `ngaytao`, `quyen`) values('{$username}' , '{$pwd1}', CURRENT_DATE(), 0);";
                $query = mysqli_query($conn, $sql);
                echo "<script>
                    $('#statusModal .modal-header').html('Thành công');
                    $('#statusModal').modal('show');
                </script>";
            }
        } catch (Exception $e) {
            echo "Error: " . $e;
        } finally {
            $conn -> close();
        }
    }
    else {
        echo "Could not connected";
    }

    function validate($query) {
        global $username, $pwd1, $pwd2, $email, $sdt, $emailReg, $sdtReg;
        $result = true;
        if($query -> num_rows > 0) {
            echo "Username existed<br>";
            $result = false;
        }
        if($username == "" || $pwd1 == "" || $pwd2 == "" || $email == "") {
            echo "Empty field<br>";
            $result = false;
        }
        else {
            if($pwd1 != $pwd2) {
                echo "Password not match<br>";
                $result = false;
            }
            if(preg_match($emailReg, $email) == false) {
                echo "Invalid email<br>";
                $result = false;
            }
            if(preg_match($sdtReg, $sdt) == false and $sdt != "") {
                echo "Invalid phone number<br>";
                $result = false;
            }
        }
        return $result;
    }
?>