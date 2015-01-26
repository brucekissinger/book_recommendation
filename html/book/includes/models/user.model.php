<?php

class User{
		
	public static function create_new_id(){
		global $db;
		
		$st1 = $db->prepare("INSERT INTO users (date_created) VALUES (CURRENT_DATE)");
		$st1->execute();

		$st2 = $db->prepare("SELECT LAST_INSERT_ID()");
		$st2->execute();		
		
		$user_id = $st2->fetchColumn();
		
		// Return the user id
		return $user_id;
	}
	
	public static function find_unrated_items($user_id){
		global $db;
	
		$st = $db->prepare("
			SELECT id, title
			FROM items 
			INNER JOIN user_items
			ON items.id = user_items.item_id
			WHERE user_items.rated_flag='N'
			AND user_items.user_id = :user_id");
		
		$st->execute(array(':user_id' => $user_id));

		// Returns an array of Item objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "Item");
	}

	public static function add_rating($user_id, $item_id, $rating){
		global $db;
	
		// add a row to the user_item_rating table
		$st1 = $db->prepare("
			INSERT INTO user_item_ratings (user_id, item_id, rating) VALUES (:user_id, :item_id, :rating)");
		
		$st1->execute(array(':user_id' => $user_id, ':item_id' => $item_id, ':rating' => $rating));

		// update the user_items table
		$st2 = $db->prepare("
			UPDATE user_items set rated_flag='Y' WHERE user_id=:user_id AND item_id=:item_id");
		
		$st2->execute(array(':user_id' => $user_id, ':item_id' => $item_id));		
		
		return;
	}
	
	public static function get_recommended_items($user_id){
		global $db;

		$st = $db->prepare("
			SELECT items.id, items.title, user_item_recommendations.rating
			FROM items 
			LEFT JOIN user_item_recommendations
			ON items.id = user_item_recommendations.item_id
			WHERE user_item_recommendations.user_id = :user_id");
		
		$st->execute(array(':user_id' => $user_id));


		// Returns an array of Item objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "Item");
	}
	
	public static function add_user_item($user_id, $item_id){
		global $db;

		try {	
			// add a row to the user_items table
			$st2 = $db->prepare("
				INSERT INTO user_items (user_id, item_id, rated_flag) VALUES (:user_id, :item_id, 'N')");
		
			$st2->execute(array(':user_id' => $user_id, ':item_id' => $item_id));

		} 
		catch (PDOException $e) {
			// do nothing
		}

		return;
	}
	
	
}

?>
