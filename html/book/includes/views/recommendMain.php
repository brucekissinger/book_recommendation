<?php render('_header',array('title'=>$title, 'activePage'=>$activePage))?>


<script>  

	function submit_form(){
		// simulate a submit button
		document.forms["recommend_main_form"].submit();
	}
	
	function selectItem(item_id) {
		var name_element = document.getElementById('select_item');
		if (name_element != 'null') {
			name_element.value = item_id;
		
			var name_element = document.getElementById('controller');
			name_element.value = "ItemDetailController";
			submit_form();
		}
	}	
	
	function createNewUser() {
		var name_element = document.getElementById('controller');
		name_element.value = "NewUserController";
		submit_form();
	}

	function submitRating() {
		var name_element = document.getElementById('controller');
		name_element.value = "recommendMainController";
		submit_form();
	}
	
	function getRecommendations() {
		var name_element = document.getElementById('controller');
		name_element.value = "recommendMainController";
		submit_form();
	}
	
	
	function supports_html5_storage() {
		try {
			return 'localStorage' in window && window['localStorage'] !== null;
		} catch (e) {
			return false;
		}
	}
	
	function get_user_id() {
		var storageSupport = supports_html5_storage();
		
		if (storageSupport) {
			var user_id = localStorage["book_user_id"];

//			if (user_id != null) {
//				alert('value from local storage is ' + user_id);
//			}
			
			// if user id is null, check to see if it is contained in the PHP set of variables 
			if (user_id == null || user_id == 'NA' || user_id == '') {
				user_id = '<?php echo($user_id) ?>';
				
				// save the user id in local storage
				localStorage["book_user_id"] = user_id;
			}

			// save the user id in a form element 
			var name_element = document.getElementById('user_id');			
			name_element.value = user_id;
			// toggle visibility of first time new user div
			if (user_id == 'NA') {
				$('#returning_user').hide();
				$('#new_user').show();
				//$('#new_user').show().trigger('updatelayout');
			} else {
				$('#new_user').hide();
				$('#returning_user').show();
			}
		} else {
			alert("Your browser does not support HTML5 local storage");
			// redirect back to the new item page?
		}
		
	}
	
	// When the page is initialized, run the get_user_id function
	$('#page1').live('pagebeforeshow',function(event){
		get_user_id();
	});
	
	
	
</script>

<form action="recommend.php" method="get" name="recommend_main_form" id="recommend_main_form">
	<!-- name of controller to process this page -->
	<input type="hidden" name="controller" id="controller" value="recommendMainController">
	<input type="hidden" name="select_item" id="select_item" value="">

	<input type="hidden" name="user_id" id="user_id" value="">
	
	<div name="new_user" id="new_user" >
		<p>It looks like this is the first time that you have visited this page.  In order to provide accurate recommendations, we need to assign a unique ID that will be stored on your web browser.  This ID will be used to rate books that you have downloaded from this site. We do not track any other information and will never sell or distribute this information.  By clicking the OK button below, you acknowledge your understanding of this and give permission.  
		</p>
					
		<a data-role="button" data-icon="check" data-inline="true" onclick="createNewUser(); return false" rel="external">OK</a>
		
	</div>

	<div name="returning_user" id="returning_user" >

<?php

	if (empty($recommended_items)) {
		echo('<p>Select the following options</p>');
		echo('<a data-role="button" data-icon="check" data-inline="true" onclick="getRecommendations(); return false" rel="external">Get recommendations</a>');
	}
?>
	
<?php
	if (empty($unrated_items) == false) {
	
		echo("<p>Please rate the following items on a scale from 1 to 5 with 5 being highest</p>");
		foreach ($unrated_items as $item) {
			echo('<div data-role="fieldcontain">');
			echo('<label for="slider' . $item->id . '">' . $item->title . '</label>');
			echo('<input type="range" name="slider' . $item->id . '" id="slider' . $item->id . '" value="0" min="1" max="5" data-highlight="true" />');
			echo('</div>');
		}	
		
		echo('<a data-role="button" data-icon="check" data-inline="true" onclick="submitRating(); return false" rel="external">Submit</a>');
	} 
?>	

<?php
	if (empty($recommended_items) == false) {
		echo('<p>Best guesses for you</p>');
		// display list of items
?>
		<ul name="itemList" id="itemList" data-role="listview" data-inset="true">
                        <?php render($recommended_items) ?>
                </ul>

<?php
	};
?>
	</div>
	
	
</form> 

<?php render('_footer')?>
