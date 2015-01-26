<!DOCTYPE html> 
<html> 
	<head> 
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<title><?php echo formatTitle()?></title> 
		<link rel="stylesheet" href="themes/Vines.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile.structure-1.1.0.min.css" />
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>

        	</script>
    </head>
    <body>
        <div data-role="page" id="page1">
            <div data-theme="b" data-role="header">
                <h1><?php echo formatTitle()?></h1>

                <div data-role="navbar" data-iconpos="top">
                    <ul>
<?php

// display the navigation buttons and highlight the current page item
if ($activePage == 'newItem') {
	echo ('<li><a href="new.php" data-theme="b" data-icon="plus" class="ui-btn-active">New</a></li>');
} else {
	echo ('<li><a href="new.php" data-theme="b" data-icon="plus">New</a></li>');
}

if ($activePage == 'popularItem') {
	echo ('<li><a href="popular.php" data-theme="b" data-icon="star" class="ui-btn-active">Popular</a></li>');
} else {
	echo ('<li><a href="popular.php" data-theme="b" data-icon="star">Popular</a></li>');
}

if ($activePage == 'recommendItem') {
	echo ('<li><a href="recommend.php" data-theme="b" data-icon="check" class="ui-btn-active">Recommend</a></li>');
} else {
	echo ('<li><a href="recommend.php" data-theme="b" data-icon="check">Recommend</a></li>');
}

if ($activePage == 'about') {
	echo ('<li><a href="about.php" data-theme="b" data-icon="gear" class="ui-btn-active">About</a></li>');
} else {
	echo ('<li><a href="about.php" data-theme="b" data-icon="gear">About</a></li>');
}
?>					

                    </ul>
                </div>  <!-- end navbar -->				
            </div> <!-- end header -->
			
            <div data-role="content" data-theme="b">	
