<?php

/* This controller handles download requests */

class DownloadController{
	public function handleRequest(){
				
		// Fetch the specific Item requested in the URL
		$item_id = $_REQUEST['select_item'];

		if(empty($item_id)){
			throw new Exception("There is no such item!");
		}			
		
		// Fetch the user_id if it is present 
		$user_id = $_REQUEST['user_id'];

		if(empty($user_id) == false){
			// add this item to the user's list of downloads
			User::add_user_item($user_id, $item_id);
		}			
	

		// redirect 
		header('Location: http://www.gutenberg.org/ebooks/' . $item_id);	
	}
}


?>
