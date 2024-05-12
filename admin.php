<?php
    session_start();

    $controller = isset($_REQUEST["controller"]) ? $_REQUEST["controller"] : "admin";
    $controller = ucfirst($controller)."Controller";
    try {
        include_once("Controller/$controller.php");
        $controller = new $controller();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $controller->post();
            die();
        }
        $controller->get();
    } catch (Exception $e) {
        echo "<h1>404 Not Found</h1>";
        die();
    }


?>