<?php

$m=new element();
echo("<div style='width: 100%; height: 50px; background-color: #D4D4D4;'>");
	$m->item("Home","../index.php","left");
	$m->item("Developer Index","index.php","left");
	$m->item("Search projects","search.php","left");
	$m->item("Logout","sc.logout.php","right");
echo("</div>");

?>