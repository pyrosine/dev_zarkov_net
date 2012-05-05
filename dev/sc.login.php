<?php

$u=$_POST["user"];
$p=$_POST["pass"];

$q=mysql_query("select * from devs where user='".mysql_real_escape_string($u)."' and pass='".sha1($p."strawberries")."'");
if(mysql_num_rows($q)==0) header("location:inc.login.php?e=badlogin");
else {
	$did=mysql_result($q,0,id);
	if($stay_logged_in) $expiry=null;
	else $expiry=time()+(3600*24);
	$token=sha1(time()."hawheehaw");
	
	mysql_query("insert into dev_sessions (did,iid,fid,timestamp,token,expiry) values ($did,$iid,$fid,".time().",'$token',$expiry)");
	setcookie('userid','$did','$expiry','/','dev.zarkov.net');
	setcookie('token','$token','$expiry','/','dev.zarkov.net');
	
	header("location:".$_SERVER["REQUEST_URI"]);
}