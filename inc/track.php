<?php

mysql_connect("localhost","dev_zarkov","fSzwFaL5YyLf2ASv5ZFa");
mysql_select_db("dev_zarkov");

$iid_q=mysql_query("select * from ips where ip='".mysql_real_escape_string($_SERVER["REMOTE_ADDR"])."'");
if(mysql_num_rows($iid_q)==0) {
	mysql_query("insert into ips (ip) values ('".mysql_real_escape_string($_SERVER["REMOTE_ADDR"])."')");
	$iid=mysql_insert_id();
}
else $iid=mysql_result($iid_q,0,"id");

$fid_q=mysql_query("select * from fingerprints where useragent='".mysql_real_escape_string($_SERVER["HTTP_USER_AGENT"])."'");
if(mysql_num_rows($fid_q)==0) {
	mysql_query("insert into fingerprints (useragent) values ('".mysql_real_escape_string($_SERVER["HTTP_USER_AGENT"])."')");
	$fid=mysql_insert_id();
}
else $fid=mysql_result($fid_q,0,"id");

mysql_query("insert into page_tracking (iid,fid,page,timestamp) values ($iid,$fid,'".str_replace($_SERVER["DOCUMENT_ROOT"],"",$_SERVER["SCRIPT_FILENAME"])."',".time().")");