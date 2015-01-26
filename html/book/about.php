<?php

/*
	This is the main PHP script for the About page
	It routes requets to the appropriate controllers
*/

require_once "includes/main.php";

try {

	// Create a default controller to display the page
	$c = new AboutController();
	
	$c->handleRequest();
}
catch(Exception $e) {
	// Display the error page using the "render()" helper function:
	render('error',array('message'=>$e->getMessage()));
}

?>