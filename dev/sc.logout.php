<?php

include("../inc/track.php");
$token=$_COOKIE["dev_token"];
mysql_query("update dev_sessions set expired=1,expiry=".time()." where token='".mysql_real_escape_string($token)."'");

setcookie("dev_id","",time()-360000,"/","dev.zarkov.net");
setcookie("dev_token","",time()-360000,"/","dev.zarkov.net");

header("location:../index.php?o=success");

?>