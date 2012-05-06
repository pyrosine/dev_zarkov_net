<?php
include("../inc/track.php");

$uid=$_COOKIE["man_id"];
$token=$_COOKIE["man_token"];

if($uid==null || $token==null) {$e="nocookies"; include("login.php");}

$v=mysql_query("select * from manager_sessions where expired=0 and mid=".mysql_real_escape_string($uid)." and token='".mysql_real_escape_string($token)."' and fid=$fid");
if(mysql_num_rows($v)==0) {$e="nosession"; include("login.php");}

$mid=mysql_result($v,0,mid);

?>