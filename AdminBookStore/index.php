<?php
	
	if (isset($_GET['controller'])) {
		$controller = $_GET['controller'];
        
	} else {
		$controller = '';
	}

	switch ($controller) {
		
		
		default:
			require('View/Admin/Pages/home.php');
			break;
	}

	