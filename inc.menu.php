<?php

$m=new element();
echo("<div style='width: 100%; height: 50px; background-color: #D4D4D4;'>");
	$m->item("Home","index.php","left");
	$m->item("For Developers","dev/index.php","right");
	$m->item("For Managers","manager/index.php","right");
echo("</div>");

?>