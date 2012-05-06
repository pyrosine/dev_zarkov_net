<?php

include("../inc/track.php");
$token=$_COOKIE["dev_token"];
mysql_query("update dev_sessions set expired=1,expiry=".time()." where token='".mysq_real_escape_string($token)."'");

header("../index.php?o=success");

?>