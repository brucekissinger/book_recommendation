<?php

/* This controller renders the Item Detail page */

class ItemDetailController{
	public function handleRequest(){
				
		// Fetch the specific Item requested in the URL
		$items = Item::find_item($_REQUEST['select_item']);

		if(empty($items)){
			throw new Exception("There is no such item!");
		}			
	
		// Fetch the active page value so that the header can properly display the active page
		$activePage = $_REQUEST['activePage'];
		
		// Render the view
		render('itemDetail',array(
			'title'		=> 'Details',
			'items'		=> $items,
			'activePage'	=> $activePage
		));
		
	}
}


?>