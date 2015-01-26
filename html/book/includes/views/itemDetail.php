<?php render('_header',array('title'=>$title, 'activePage'=>$activePage))?>

  
<script>  

	function submit_form(){
		// simulate a submit button
		document.forms["detail_form"].submit();
	}

	function downloadItem(item_id) {
		var name_element = document.getElementById('select_item');
		if (name_element != 'null') {
			name_element.value = item_id;
		
			var name_element = document.getElementById('controller');
			name_element.value = "downloadController";
			submit_form();
		}
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

//                      if (user_id != null) {
//                              alert('value from local storage is ' + user_id);
//                      }

                        // if user id is null, check to see if it is contained in the PHP set of variables
                        if (user_id == null || user_id == 'NA') {
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
        //$('#page1').live( 'pageinit',function(event){
        $('#page1').live('pagebeforeshow',function(event){
                get_user_id();
        });



</script>

<form action="detail.php" method="get" name="detail_form" id="detail_form">

        <!-- name of controller to process this page -->
        <input type="hidden" name="controller" id="controller" value="itemDetailController">
        <input type="hidden" name="select_item" id="select_item" value="">

        <input type="hidden" name="user_id" id="user_id" value="">



	<style>
		table caption { text-align:center; font-weight:bold; }
		table thead th { text-align:left; border-bottom-width:1px; border-top-width:1px; }
		table th, td { text-align:left; padding:6px;} 
	</style>

	<table summary="This table lists all the book details">
		  <tbody>
		  <tr>
		    <th scope="col">ID</th>
		    <td><?php echo ($items[0]->id) ?></td>		  
		  </tr>
		  <tr>
		    <th scope="col">Title</th>
		    <td><?php echo ($items[0]->title) ?></td>		  
		  </tr>
		  <tr>
		    <th scope="col">Subject</th>
		    <td><?php echo ($items[0]->subject) ?></td>		  
		  </tr>		
		  <tr>
		    <th scope="col">Creator</th>
		    <td><?php echo ($items[0]->creator) ?></td>		  
		  </tr>	
		  <tr>
		    <th scope="col"></th>
		    <td><a href='http://en.wikipedia.org/w/index.php?title=Special:Search&search=<?php echo (urlencode($items[0]->creator)) ?>'>Check Wikipedia</a><td>		  
		  </tr>	
		  <tr>
		    <th scope="col">Date Created</th>
		    <td><?php echo ($items[0]->date_created) ?></td>		  
		  </tr>			  
		  <tr>
		    <th scope="col">Language Code</th>
		    <td><?php echo ($items[0]->lang) ?></td>		  
		  </tr>			  
		  <tr>
		    <th scope="col">Category Code</th>
		    <td><?php echo ($items[0]->lcc_code) ?></td>		  
		  </tr>	
		  <tr>
		    <th scope="col">Subject Code</th>
		    <td><?php echo ($items[0]->lcsh_code) ?></td>		  
		  </tr>	
		  <tr>
		    <td></td>
		    <td><a onclick="downloadItem('<?php echo ($items[0]->id) ?>'); return false" rel="external" data-role="button">Download</a></td>		  
		  </tr>	
		  
		  </tbody>
		</table>

</form>	
		 
	
<?php render('_footer')?>
