<?php

Route::set('index.php', function(){
	Css::linkCss('cssLinks');
	Index::createView('layout');
});

Route::set('company', function(){
	Company::createView('company');
});

Route::set('WebDevelopper', function(){
	echo 'La page WebDevelopper';
});

Route::set('Interview', function(){
	echo 'La page Interview';
});

Route::set('Conclusion', function(){
	echo 'La page Conclusion';
});


?>