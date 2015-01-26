<?php

class Item{
	
	public static function find_item($id){
		global $db;
	
		
		$st = $db->prepare("SELECT * FROM items WHERE id=:id");
		
		$st->execute(array(':id' => $id));

		
		// Returns an array of Item objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "Item");
	}
	
	public static function findNew($language, $viewMode){
		global $db;
	
		if ($viewMode == "Category") {
			$st = $db->prepare("
				select id, title, ifnull(left(lcc_code,1), 'NULL') as major_code, lcc_codes.meaning 
				from items 
				inner join lcc_codes
				on ifnull(left(lcc_code,1), 'NULL') = lcc_codes.code
				where lang=:language and date_created > date_sub(curdate(),interval 30 day)
				order by major_code");	
			
		}
		else { 
			$st = $db->prepare("
				SELECT id, title, date_created FROM items 
				WHERE lang=:language AND date_created > date_sub(curdate(),interval 360 day) 
				ORDER BY date_created DESC");
		}
		
		
		$st->execute(array(':language' => $language));

		
		// Returns an array of Item objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "Item");
	}
	
	public static function findPopular($language, $viewMode){
		global $db;
	
		if ($viewMode == "Category") {
			$st = $db->prepare("
				select id, title, ifnull(left(lcc_code,1), 'NULL') as major_code, lcc_codes.meaning, item_downloads.download_quantity
				from items 
				left join lcc_codes on (ifnull(left(items.lcc_code,1), 'NULL') = lcc_codes.code)
				left join item_downloads on (items.id = item_downloads.item_id)
				where lang=:language 
				and item_downloads.download_quantity is not null
				order by major_code, item_downloads.download_quantity DESC limit 500");	
			
		}
		else { 
			$st = $db->prepare("
				SELECT id, title, item_downloads.download_quantity
				FROM items 
				INNER JOIN item_downloads
				ON items.id = item_downloads.item_id
				WHERE lang=:language
				ORDER BY item_downloads.download_quantity DESC limit 500");
		}
		
		
		$st->execute(array(':language' => $language));

		
		// Returns an array of Item objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "Item");
	}
	
}

?>
