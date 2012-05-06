<?php
$m_item=0;
function item($item,$url){
	global $m_item;
	echo("<div id='$m_item' style='background-color: #8C8C8C; display: inline; border:1px dotted;' ");
		echo("onMouseOver='document.getElementById($m_item).style.background-color=".'"#A8A8A8"'."' ");
		echo("onMouseOut='document.getElementById($m_item).style.background-color=".'"#8C8C8C"'."' ");
		echo(">");
		echo("<a href='$url'>$item</a>");
	echo("</div>");
	$m_item++;
}
echo("<div style='width: 90%; margin-right: auto; margin-left: auto; height: 40px;'>");
	item("Home","index.php");
	item("For Developers","dev/index.php");
	item("For Managers","manager/index.php");
echo("</div>");

?>