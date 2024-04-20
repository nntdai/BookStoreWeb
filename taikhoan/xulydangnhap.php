<?php
    session_start();

    $sql = "select * from `taikhoan` where `tendangnhap`='{$username}'";
    try {
        $query = mysqli_query($conn, $sql);
        if($username == "" || $pwd == "") {
            header("Location: ../index.php?modalError=dangnhap&error=empty");
        }
        else if($query -> num_rows > 0) 
        {
            $row = mysqli_fetch_array($query);
            if($row["matkhau"] == $pwd) {
                $sql = "
                    select 
                    from taikhoan, quyen, chucnang, quyenchucnang
                    where taikhoan.quyen = quyen.maQuyen and quyen.maQuyen = chucnang.maQuyen and taikhoan.tendangnhap = '{$username}'
                    and tendangnhap = '{$username}'
                ";
                if ($row["quyen"] == 0) {
                    $_SESSION["nguoidung"] = $username;
                    if(isset($_SESSION["nguoidung"])) {
                        echo "Xin chao ".$_SESSION["nguoidung"];
                    }
                    header("Location: ../index.php?modalSuccess=dangnhap");
                }
                else if($row["quyen"] == 1) {
                    $_SESSION["nguoidung"] = $username;
                    header("Location: ../quantri.php");
                }
            }
            else {
                header("Location: ../index.php?modalError=dangnhap&error=pwd");
            }
        }
        else {
            header("Location: ../index.php?modalError=dangnhap&error=username");
        }
    } catch (Exception $e) {
        echo "Error: " . $e;
    }
?>