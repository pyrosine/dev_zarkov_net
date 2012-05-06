<?php

include("../inc/track.php");

$u=$_POST["user"];
$p=$_POST["pass"];
$e=$_POST["email"];

$uq=mysql_query("select * from managers where user='".mysql_real_escape_string($u)."'");
if(mysql_num_rows($uq)!=0) header("location:register.php?e=uexists");
$eq=mysql_query("select * from managers where email='".mysql_real_escape_string($e)."'");
if(mysql_num_rows($eq)!=0) header("location:register.php?e=eexists");

mysql_query("insert into managers (user,pass,email) values ('".mysql_real_escape_string($u)."','".sha1($p."strawberries")."','".mysql_real_escape_string($e)."')");
$mid=mysql_insert_id();
$expiry=time()+(3600*24);
$token=sha1(time()."hawheehaw");
	
mysql_query("insert into manager_sessions (mid,iid,fid,timestamp,token,expiry) values ($mid,$iid,$fid,".time().",'$token',$expiry)");
setcookie('man_id',$mid,$expiry,'/','dev.zarkov.net');
setcookie('man_token',$token,$expiry,'/','dev.zarkov.net');

header("location:index.php");

?>