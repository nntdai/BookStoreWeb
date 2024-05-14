
<?php
	session_start();
	define('PROJECT_ROOT_PATH', __DIR__);
	if (!empty($_SESSION['username'])&&($_SESSION['username']['ten']=='Admin'))
	{
		if (isset($_GET['controller'])) {
			$controller = $_GET['controller'];
			
		} else {
			$controller = '';
		}
	
		switch ($controller) {
			
			
			default:
				require('View/Admin/index.php');
				break;
		}
		
	}
	else{
		
	
		require 'View/Client/login_admin.php';
	}
	