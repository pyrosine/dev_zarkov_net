<?php
include("inc.user.php");

$title=$_POST["title"];
$summary=$_POST["textarea"];
$r_currency=$_POST["currency"];
$r_amount=$_POST["amount"];
$deadline_app=strtotime($_POST["a_dd"]."-".$_POST["a_mm"]."-".$_POST["a_yy"]);
$deadline_pro=strtotime($_POST["p_dd"]."-".$_POST["p_mm"]."-".$_POST["p_yy"]);
$private=$_POST["private"];

mysql_query("insert into projects (title,summary,pmid,created,deadline_application,deadline) values ('$title','$summary',$mid,".time().",$deadline_app,$deadline_pro)");
mysql_query("insert into project_managers (pid,mid,r_currency,r_amount) values (".mysql_insert_id().",$mid,'$r_currency',$r_amount)");
header("location:index.php?o=success");

?>