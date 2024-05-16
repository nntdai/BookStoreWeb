<?php

include 'C:\xampp\htdocs\AdminBookStore\Model\Admin\listTaiKhoan.php';

if (isset($_POST['username']))
{
    $taiKhoanModel = new TaiKhoanModel();
    $taiKhoan=$taiKhoanModel->Login($_POST['username']);
    if (empty($taiKhoan))
        echo "Tài khoản không tồn tại ";
    else
    {
        if ($_POST['password']==$taiKhoan['matKhau'])
        {
            if ($taiKhoan['ten']=='Admin')
            {
                
            $_SESSION['username']=$taiKhoan;
                echo "login";
            }
            else
            
                echo "Bạn không có quyền truy cập vào trang Admin !";
        }
        else
            echo "Sai mật khẩu";
    }
   
}
?>