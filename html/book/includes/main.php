<?php

/*
	This is the main include file.
	It is only used in index.php and keeps it much cleaner.
*/

require_once "includes/config.php";
require_once "includes/connect.php";
require_once "includes/helpers.php";

require_once "includes/models/item.model.php";
require_once "includes/models/user.model.php";

require_once "includes/controllers/newitems.controller.php";
require_once "includes/controllers/popularitems.controller.php";
require_once "includes/controllers/recommendMain.controller.php";
require_once "includes/controllers/about.controller.php";
require_once "includes/controllers/itemdetail.controller.php";
require_once "includes/controllers/newuser.controller.php";
require_once "includes/controllers/download.controller.php";

// This will allow the browser to cache the pages of the app.
/*
header('Cache-Control: max-age=3600, public');
header('Pragma: cache');
header("Last-Modified: ".gmdate("D, d M Y H:i:s",time())." GMT");
header("Expires: ".gmdate("D, d M Y H:i:s",time()+3600)." GMT");
*/
?>
