<?php
    include_once("Model/EntityAccount.php");
    session_start();

    $controller = isset($_REQUEST["controller"]) ? $_REQUEST["controller"] : "admin";
    $controller = ucfirst($controller)."Controller";

    include_once("Controller/$controller.php");
    $controller = new $controller();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $controller->post();
        die();
    }
    $controller->get();


?>