<?php

include("../inc/track.php");

$u=$_POST["user"];
$p=$_POST["pass"];
$e=$_POST["email"];

$uq=mysql_query("select * from devs where user='".mysql_real_escape_string($u)."'");
if(mysql_num_rows($uq)!=0) header("location:register.php?e=uexists");
$eq=mysql_query("select * from devs where email='".mysql_real_escape_string($e)."'");
if(mysql_num_rows($eq)!=0) header("location:register.php?e=eexists");


mysql_query("insert into devs (user,pass,email) values ('".mysql_real_escape_string($u)."','".sha1($p."strawberries")."','".mysql_real_escape_string($e)."')") or die(mysql_error());
$did=mysql_insert_id();
$expiry=time()+(3600*24);
$token=sha1(time()."pyrosine");

mysql_query("insert into dev_sessions (did,iid,fid,timestamp,token,expiry) values ($did,$iid,$fid,".time().",'$token',$expiry)");
setcookie('dev_id',$did,$expiry,'/','dev.zarkov.net');
setcookie('dev_token',$token,$expiry,'/','dev.zarkov.net');

header("location:index.php");

?>