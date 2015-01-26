<?php

/* This controller creates a new user and renders the recommendaiton page */

class NewUserController{
	public function handleRequest(){
				
		// Create a new user id 
		$user_id = User::create_new_id();	
		
		// Render the  view
		render('recommendMain',array(
			'title'			=> 'Recommendations',
			'activePage'	=> 'recommendItem',
			'user_id'		=> $user_id
		));
		
	}
}

?>