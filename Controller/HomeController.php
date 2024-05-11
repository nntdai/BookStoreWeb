<?php
    class HomeController {
        public function get() {
            include_once("View/Home.php");
        }

        public function script() {
            echo "<script src='js/home.js'></script>";
        }
    }
?>