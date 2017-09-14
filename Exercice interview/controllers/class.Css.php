<?php

class Css extends Controller {

	public static function linkCss($cssFileName) {
		require_once('./views/css.' .$cssFileName .'.php' );
	}

}
?>