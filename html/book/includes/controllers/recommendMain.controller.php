<?php

/* This controller renders the Recommended Items page */

class RecommendMainController{
	public function handleRequest(){
		
		// Get the user id if available
		$user_id = $_REQUEST['user_id'];
		if(empty($user_id)){
			$user_id = "NA";
		} else {
			
			// Get a list of unrated items for this user -- note that this variable may be empty
			$unrated_items = User::find_unrated_items($user_id);
		}
	
		// process any ratings that were submitted
		$anyRatingFlag = 'false';
		foreach ($unrated_items as $item) {
			$rating = $_REQUEST['slider' . $item->id];
			if ($rating > 0) {
				User::add_rating($user_id, $item->id, $rating);
				$anyRatingFlag = 'true';
			}
		}
	
		// if the user just submitted some ratings, don't ask them to rate the remaining items again
		if ($anyRatingFlag == 'true') {
			$unrated_items = null;
		}
	
		// Get new recommendations for this user
		if ($user_id <> 'NA') {
			$recommended_items = User::get_recommended_items($user_id);

			// if the user is new, there may be no recommendations
			// so ask for recommendations for the special user 
			// with ID=0
			if (empty($recommended_items)) {
				$recommended_items = User::get_recommended_items(0);
			}
		}
	
		// Render the  view
		render('recommendMain',array(
			'title'		=> 'Recommendations',
			'activePage'	=> 'recommendItem',
			'user_id'	=> $user_id,
			'unrated_items'	=> $unrated_items,
			'recommended_items' => $recommended_items
		));
	}
}

?>
