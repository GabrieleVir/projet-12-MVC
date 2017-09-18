<?php

Route::set('index.php', function(){
	Index::createView('Index');
});

Route::set('Entreprise', function(){
	Controller::createView('Entreprise');
});

Route::set('WebDev', function(){
	Controller::createView('WebDev');
});

Route::set('Interview', function(){
	Controller::createView('Interview');
});

Route::set('Conclusion', function(){
	Controller::createView('Conclusion');
});



?>