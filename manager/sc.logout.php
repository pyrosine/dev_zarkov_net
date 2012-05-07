<?php

include("../inc/track.php");
$token=$_COOKIE["man_token"];
mysql_query("update manager_sessions set expired=1,expiry=".time()." where token='".mysql_real_escape_string($token)."'");

setcookie("man_id","",time()-360000,"/","dev.zarkov.net");
setcookie("man_token","",time()-360000,"/","dev.zarkov.net");

header("location:../index.php?o=success");

?>