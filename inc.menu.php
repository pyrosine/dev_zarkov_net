<?php
$m_item=0;
function item($item,$url){
	echo("<div id='$m_item' style='background-color: gray; display: inline; border:1px dotted;' ");
		echo("onMouseOver='document.getElementById($m_item).style.background-color=".'"red"'."' ");
		echo("onMouseOut='document.getElementById($m_item).style.background-color=".'"gray"'."' ");
		echo(">");
		echo("<a href='$url'>$item</a>");
	echo("</div>");
	$m_item++;
}
echo("<div style='width: 90%; margin-right: auto; margin-left: auto; height: 40px;'>");
	item("Home","index.php");
	item("Projects","p.php");
echo("</div>");

?>