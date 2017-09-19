<?php
//The set function defines the different possible URI. The nav bar let me go from one page to another
Route::set('index.php', function(){
	//I divided the view in two big parts, modules (recurent that are used often on the other pages) and view (the content of the page)
	Index::createModule('header');
	Index::createModule('intro');
	Index::createModule('introheader');
	Index::createModule('nav');
	Index::createView('index');
	Index::createModule('footer');
});

Route::set('Entreprise', function(){
	Company::createModule('header');
	Company::createModule('intro');
	Company::createModule('nav');
	Company::createView('entreprise');
	Company::createModule('footer');
});

Route::set('WebDev', function(){
	WebDevelopper::createModule('header');
	WebDevelopper::createModule('intro');
	WebDevelopper::createModule('nav');
	WebDevelopper::createView('webdev');
	WebDevelopper::createModule('footer');
});

Route::set('Interview', function(){
	Interview::createModule('header');
	Interview::createModule('intro');
	Interview::createModule('nav');
	Interview::createView('interview');
	Interview::createModule('footer');
});

Route::set('Conclusion', function(){
	Conclusion::createModule('header');
	Conclusion::createModule('intro');
	Conclusion::createModule('nav');
	Conclusion::createView('conclusion');
	Conclusion::createModule('footer');

});



?>