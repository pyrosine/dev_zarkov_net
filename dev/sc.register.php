<?php

include("../inc/track.php");

$u=$_POST["user"];
$p=$_POST["pass"];
$e=$_POST["email"];

mysql_query("insert into devs (user,pass,email) values ('".mysql_real_escape_string($u)."','".mysql_real_escape_string($p)."','".mysql_real_escape_string($e)."')");
$did=mysql_insert_id();
$expiry=time()+(3600*24);
$token=sha1(time()."hawheehaw");
	
mysql_query("insert into dev_sessions (did,iid,fid,timestamp,token,expiry) values ($did,$iid,$fid,".time().",'$token',$expiry)");
setcookie('dev_id','$did','$expiry','/','dev.zarkov.net');
setcookie('dev_token','$token','$expiry','/','dev.zarkov.net');

header("index.php");

?>