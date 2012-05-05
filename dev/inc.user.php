<?php
include("../inc/track.php");

$uid=$_COOKIE["userid"];
$token=$_COOKIE["token"];

if($uid==null || $token==null) {$e="nocookies"; include("inc.login.php");}

$v=mysql_query("select * from dev_sessions where expired=0 and id=$uid and token='$token' and fid=$fid");
if(mysql_num_rows($v)==0) {$e="nosession"; include("inc.login.php");}

$did=mysql_result($v,0,did);

?>