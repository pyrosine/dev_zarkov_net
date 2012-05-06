<?php
$m_item=0;
function item($item,$url,$side){
	global $m_item;
	echo("<div style='display: inline; border:1px dotted; float:$side;'>");
	echo("<a id=$m_item style='font-size: 30px;' ");
		echo("onMouseOver='document.getElementById($m_item).style.color=".'"#F7F7F7"'."' ");
		echo("onMouseOut='document.getElementById($m_item).style.color=".'"black"'."' ");
		echo("href='$url'>$item</a>");
	echo("</div>");
	$m_item++;
}
echo("<div style='width: 100%; height: 50px; background-color: #D4D4D4;'>");
	item("Home","index.php","left");
	item("For Developers","dev/index.php","right");
	item("For Managers","manager/index.php","right");
echo("</div>");

?>