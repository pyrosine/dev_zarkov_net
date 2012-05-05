<?php

function r_manager($id){
	$q=mysql_query("select * from managers where id=".$id);
	return mysql_result($q,0,user);
}
function r_dev($id){
	$q=mysql_query("select * from devs where id=".$id);
	return mysql_result($q,0,user);
}

?>