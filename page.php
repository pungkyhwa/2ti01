<?php
	$page=$_GET["page"];
	if($page) {
		$path=$page.".php";
		if (file_exists($path)){
			include($path);
		}
	}else {
		include "home.php";
	}
?>
   