<?php
    include_once("C:/xampp/htdocs/BookStoreWeb/Controller/Admin/listTaiKhoan.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Phonedata=isset($_POST['PhoneText_remove']) ? $_POST['PhoneText_remove'] : '';
        // $Maildata=isset($_POST['MailText_update']) ? $_POST['MailText_update'] : '';
        // $Namedata=isset($_POST['NameText_update']) ? $_POST['NameText_update'] : '';
        // $Passdata=isset($_POST['PassText_update']) ? $_POST['PassText_update'] : '';
        // $Iddata=isset($_POST['cboChucVu_update']) ? $_POST['cboChucVu_update'] : '';
        if($Phonedata!=''){
            $TaiKhoan_Control=new listTaiKhoan();
            $TaiKhoan_remove=$TaiKhoan_Control->DeleteAccount($Phonedata);
            if($TaiKhoan_remove){
                echo "2";
            }else{
                echo "3";
            }
        }else{
            echo "4";
        }    
    }
?>