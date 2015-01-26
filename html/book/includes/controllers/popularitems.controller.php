<?php

/* This controller renders the Popular Items page */
      
class PopularItemsController{
	public function handleRequest(){
		
		// Get the selected method for browsing 
		$browseMode = $_REQUEST['browseMode'];
		if(empty($browseMode)){
			$browseMode = "Title";
		}
		
		// Select all items and their popularity
		$items = Item::findPopular('en', $browseMode);
		
		// Render the  view
		render('popularItem',array(
			'title'			=> 'Select Item',
			'items'			=> $items,
			'browseMode'	=> $browseMode,
			'activePage'	=> 'popularItem'
		));
	}
}

?>