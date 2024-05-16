	<?php
        include_once("C:/xampp/htdocs/AdminBookStore/Controller/Admin/listTaiKhoan.php");
        $TaiKhoan_Model=new TaiKhoanModel();
        $TaiKhoan=$TaiKhoan_Model->get_all();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $Phonedata=isset($_POST['PhoneText']) ? $_POST['PhoneText'] : '';
            $Maildata=isset($_POST['MailText']) ? $_POST['MailText'] : '';
            $Namedata=isset($_POST['NameText']) ? $_POST['NameText'] : '';
            $Passdata=isset($_POST['PassText']) ? $_POST['PassText'] : '';
            $Iddata=isset($_POST['cboChucVu']) ? $_POST['cboChucVu'] : '';
            if($Phonedata!='' && $Maildata!='' && $Namedata!='' && $Passdata!='' && $Iddata!=''){
                $temp=0;

                foreach ($TaiKhoan as $tk){
                    if(strcasecmp($Phonedata, $tk['soDienThoai']) == 0){
                        $temp= 1;
                    }
                }
                if($temp== 1){
                    echo "1";
                }else{
                    $TaiKhoan_Control=new listTaiKhoan();
                    $TaiKhoan_Add=$TaiKhoan_Control->add_TaiKhoan($Phonedata, $Maildata, $Namedata, $Passdata, $Iddata);
                    if($TaiKhoan_Add){
                        echo "2";
                    }else{
                        echo "3";
                    }
                }   
            }else{
                echo "4";
            }    
        }
	?>