<?php
include("../inc/track.php");

$uid=$_COOKIE["dev_id"];
$token=$_COOKIE["dev_token"];

if($uid==null || $token==null) {$e="nocookies"; include("login.php");}

$v=mysql_query("select * from dev_sessions where expired=0 and did=$uid and token='$token' and fid=$fid");
if(mysql_num_rows($v)==0) {$e="nosession"; include("login.php");}

$did=mysql_result($v,0,did);

?>