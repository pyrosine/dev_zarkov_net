<?php

include("../inc/track.php");

$u=$_POST["user"];
$p=$_POST["pass"];
$e=$_POST["email"];

mysql_query("insert into managers (user,pass,email) values ('".mysql_real_escape_string($u)."','".mysql_real_escape_string($p)."','".mysql_real_escape_string($e)."')");
$mid=mysql_insert_id();
$expiry=time()+(3600*24);
$token=sha1(time()."hawheehaw");
	
mysql_query("insert into manager_sessions (mid,iid,fid,timestamp,token,expiry) values ($mid,$iid,$fid,".time().",'$token',$expiry)");
setcookie('man_id','$mid','$expiry','/','dev.zarkov.net');
setcookie('man_token','$token','$expiry','/','dev.zarkov.net');

header("index.php");

?>