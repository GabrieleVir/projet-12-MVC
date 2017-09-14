<?php

class Controller extends Database {

	public static function createView($viewName){
		require_once('./views/'.$viewName.'.php');
	}
	
}

?>
