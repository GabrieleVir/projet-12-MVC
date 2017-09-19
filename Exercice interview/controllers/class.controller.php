<?php

class Controller {

	public static function createView($viewName){
		require_once('./views/article.'.$viewName.'.html');
	}

	public static function createModule($moduleName){
		require_once('./views/module.'.$moduleName.'.html');
	}
	
}

?>
