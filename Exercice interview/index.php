<?php 
	// include 'views/layout.php'; 
	// include 'views/footer.php'; 

	function __autoload($class_name){
		$class_name_lower = strtolower($class_name);
	
		if(file_exists('controllers/class.' . $class_name_lower . '.php')){
			require_once('controllers/class.' . $class_name_lower . '.php');
		} else if(file_exists('assets/css/' . $class_name_lower . '.css')) {
			require_once('assets/css/' . $class_name_lower . '.css');
		} else if(file_exists('assets/js/' . $class_name_lower . '.js')){
			require_once('assets/js/' . $class_name_lower . '.js');
		} else if(file_exists('views/' . $class_name_lower . '.html')){
			require_once('views/' . $class_name_lower . '.html');
		}
	}


	require_once ('routes.php');

?>


