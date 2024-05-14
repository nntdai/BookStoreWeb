<?php
    include_once("C:/xampp/htdocs/AdminBookStore/Controller/Admin/Donhang.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Iddata=isset($_POST['madonText_update']) ? $_POST['madonText_update'] : '';
        $Order_done=isset($_POST['OrderdoneText_update']) ? $_POST['OrderdoneText_update'] : '';
        $Idstt=isset($_POST['cbostatus_update']) ? $_POST['cbostatus_update'] : '';
        if($Iddata!='' && $Idstt!=''){
            if($Idstt==1){
                $Order_done='';
                $Donhang_Control=new Donhang_list();
                $Donhang_Update=$Donhang_Control->update_order($Iddata, $Idstt, $Order_done);
                if($Donhang_Update){
                    echo "2";
                }else{
                    echo "3";
                }
            }else{
                $Order_done='NOW()';
                $Donhang_Control=new Donhang_list();
                $Donhang_Update=$Donhang_Control->update_order($Iddata, $Idstt, $Order_done);
                if($Donhang_Update){
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