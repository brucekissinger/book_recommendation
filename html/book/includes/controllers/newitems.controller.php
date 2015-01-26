<?php

/* This controller renders the New Items page */

class NewItemsController{
	public function handleRequest(){
		
		// Get the selected method for browsing 
		$browseMode = $_REQUEST['browseMode'];
		if(empty($browseMode)){
			$browseMode = "Title";
		}
		
		// Select all the new items
		$items = Item::findNew('en', $browseMode);
		
		// Render the  view
		render('newItem',array(
			'title'			=> 'Select Item',
			'items'			=> $items,
			'browseMode'	=> $browseMode,
			'activePage'	=> 'newItem'
		));
	}
}

?>