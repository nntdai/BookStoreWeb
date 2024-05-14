<?php
    include_once("C:/xampp/htdocs/AdminBookStore/Model/Admin/tinhtrangdonhang.php");

    class tinhtrangdonhang_list{
        public function __construct(){
            $tinhtrangdon_Model=new tinhtrangdonhang_Model();
            $TTD=$tinhtrangdon_Model->get_all();
        }
    }
?>