<?php

include("../inc/track.php");

$u=$_POST["user"];
$p=$_POST["pass"];

$q=mysql_query("select * from devs where user='".mysql_real_escape_string($u)."' and pass='".sha1($p."strawberries")."'");
if(mysql_num_rows($q)==0) header("location:login.php?e=badlogin");
else {
	$did=mysql_result($q,0,id);
	if($stay_logged_in) $expiry=0;
	else $expiry=time()+(3600*24);
	$token=sha1(time()."pyrosine");
	
	mysql_query("insert into dev_sessions (did,iid,fid,timestamp,token,expiry) values ($did,$iid,$fid,".time().",'$token',$expiry)");
	setcookie('dev_id',$did,$expiry,'/','dev.zarkov.net');
	setcookie('dev_token',$token,$expiry,'/','dev.zarkov.net');
	
	if(strpos($_SERVER["HTTP_REFERER"],"login.php")!=false || $_SERVER["HTTP_REFERER"]==null) $r="index.php";
	else $r=$_SERVER["HTTP_REFERER"];
	header("location:".$r);
}