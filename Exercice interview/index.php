<?php 
	// include 'views/layout.php'; 
	// include 'views/footer.php'; 

	function __autoload($class_name){
		if(file_exists('utility/class.' . $class_name . '.php')) {
			require_once('utility/class.' . $class_name . '.php');
		} else if(file_exists('controllers/class.' . $class_name . '.php')){
			require_once('controllers/class.' . $class_name . '.php');
		} else if(file_exists('assets/css/' . $class_name . '.css')) {
			require_once('assets/css/' . $class_name . '.css');
		} else if(file_exists('assets/js/' . $class_name . '.js')){
			require_once('assets/js/' . $class_name . '.js');
		}
	}


?>
<?php

	require_once ('Routes.php');

?>

