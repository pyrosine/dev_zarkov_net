<?php

mysql_connect("localhost","dev_zarkov","fSzwFaL5YyLf2ASv5ZFa");
mysql_select_db("dev_zarkov");

////// Expiring sessions
mysql_query("update manager_sessions set expired=1 where expiry!=0 and expiry<".time()."");
mysql_query("update dev_sessions set expired=1 where expiry!=0 and expiry<".time()."");

///// Expiring projects
$e=mysql_query("select * from projects where deadline<".time());
for($z=0;$z<mysql_num_rows($e);$z++){
	$e_m=mysql_query("select * from project_managers where pid=".mysql_result($e,$z,"id"));
	for($y=0;$y<mysql_num_rows($e_m);$y++){
		$e_m_q=mysql_query("select * from managers where id=".mysql_result($e_m,$y,"mid"));
		mail(mysql_result($e_m_q,0,"email")."dev.zarkov.net: Project #".mysql_result($e,$z,"id")." update","","From: noreply@dev.zarkov.net");
	}
	$e_d=mysql_query("select * from project_devs where pid=".mysql_result($e,$z,"id"));
	for($y=0;$y<mysql_num_rows($e_d);$y++){
		$e_d_q=mysql_query("select * from devs where id=".mysql_result($e_d,$y,"did"));
		$email="";
		mail(mysql_result($e_d_q,0,"email")."dev.zarkov.net: Project #".mysql_result($e,$z,"id")." update",$email,"From: noreply@dev.zarkov.net");
	}
}
mysql_query("update projects set closed=1,active=0 where deadline<".time()."");

?>