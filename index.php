<?php 
    session_start();

    $accessible = array("home", "account", "homeadmin", "admin");
    $_REQUEST["controller"] = isset($_REQUEST["controller"]) ? $_REQUEST["controller"] : "home";
    try {
        $controller = ucfirst($_REQUEST["controller"])."Controller";
        include_once("Controller/$controller.php");
        $controller = new $controller();

        //neu la post thi bo qua kiem tra accessible vi moi controller se kiem tra quyen
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $controller->post();
            die();
        }

        //kiem tra accessible
        if(!in_array(strtolower($_REQUEST["controller"]), $accessible)) {
            echo "Ban khong co quyen truy cap trang nay";
            die();
        }
        $controller->get();
    } catch (Exception $e) {
        echo "<h1>404 Not Found</h1>";
        die();
    }
?>
