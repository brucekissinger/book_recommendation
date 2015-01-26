<?php

/* This controller renders the About page */

class AboutController{
	public function handleRequest(){
		
		// Render the view
		render('about',array(
			'title'			=> 'About Change',
			'activePage'	=> 'about'
		));
	}
}

?>