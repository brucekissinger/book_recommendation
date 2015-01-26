<?php

/*
	This is the main PHP script for the New Items page
	It routes requets to the appropriate controllers
*/

require_once "includes/main.php";

try {

	// Create a default controller to display the main home page
	$c = new NewItemsController();
	
	// Get the controller name if specified on a form 
	$controller_name=$_REQUEST['controller'];
	
	// Create a different controller if needed
	switch ($controller_name) {
	    case "NewItemsController":
			$c = new NewItemsController();
	        break;
	    case "ItemDetailController":
	        $c = new ItemDetailController();	
			break;
	}	
	
	$c->handleRequest();
}
catch(Exception $e) {
	// Display the error page using the "render()" helper function:
	render('error',array('message'=>$e->getMessage()));
}

?>