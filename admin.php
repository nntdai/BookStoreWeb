<?php
  	session_start();
	if (isset($_SESSION["username"]) && $_SESSION["allowedToAccessAdminPage"] == 1) {
		
	}
	else if (isset($_SESSION["username"]) && $_SESSION["allowedToAccessAdminPage"] == 0) {
		echo "<h2>Ban khong co quyen truy cap trang nay</h2><br>";
		echo "<a href='admin.php'>Quay lai trang chu</a><br>";
		echo "<a href='login.php'>Dang xuat</a><br>";
		die();
	}
	else {
		echo "Ban chua dang nhap.";
		header("Location: login.html");
		die();
	}
	
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




    
    

