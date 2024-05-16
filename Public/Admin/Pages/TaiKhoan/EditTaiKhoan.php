<?php
    include_once("C:/xampp/htdocs/AdminBookStore/Controller/Admin/listTaiKhoan.php");
    $TaiKhoan_Model=new TaiKhoanModel();
    $TaiKhoan=$TaiKhoan_Model->get_all();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Phonedata=isset($_POST['PhoneText_update']) ? $_POST['PhoneText_update'] : '';
        $Maildata=isset($_POST['MailText_update']) ? $_POST['MailText_update'] : '';
        $Namedata=isset($_POST['NameText_update']) ? $_POST['NameText_update'] : '';
        $Passdata=isset($_POST['PassText_update']) ? $_POST['PassText_update'] : '';
        $Iddata=isset($_POST['cboChucVu_update']) ? $_POST['cboChucVu_update'] : '';
        if($Phonedata!='' && $Maildata!='' && $Namedata!='' && $Passdata!='' && $Iddata!=''){
            $TaiKhoan_Control=new listTaiKhoan();
            $TaiKhoan_Update=$TaiKhoan_Control->edit_TaiKhoan($Phonedata, $Maildata, $Namedata, $Passdata, $Iddata);
            if($TaiKhoan_Update){
                echo "2";
            }else{
                echo "3";
            }
        }else{
            echo "4";
        }    
    }
?>