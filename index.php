<?php 
    include_once("Controller/AccountController.php");
    session_start();

    $_REQUEST["controller"] = isset($_REQUEST["controller"]) ? $_REQUEST["controller"] : "home";
    
    $controller = ucfirst($_REQUEST["controller"])."Controller";
    include_once("Controller/$controller.php");
    $controller = new $controller();

    //neu la post thi bo qua kiem tra accessible vi moi controller se kiem tra quyen
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $controller->post();
        die();
    }

    //cap nhat lai thong tin tai khoan khi truy cap trang
    if (isset($_SESSION["user"])) { 
        $temp = new AccountController();
        $_SESSION["user"] = $temp->getAccountDetail($_SESSION["user"]->soDienThoai);
    } 

    $controller->get();
    die();
?>
