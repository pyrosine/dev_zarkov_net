<?php
include("inc.user.php");

include("../inc/header.php");
include("inc.menu.php");

$pid=$_GET["pid"];
$pq=mysql_query("select * from projects where id=".mysql_real_escape_string($pid)."");
if(mysql_num_rows($pq)==0){ echo("Project ID $pid does not exist."); exit();}

$p_mq=mysql_query("select * from project_managers where mid=$mid");
if(mysql_num_rows($p_mq)==0 && mysql_result($pq,0,"private")==1){ echo("Project ID $pid is both private and not a project managed by you."); exit();}
elseif(mysql_num_rows($p_mq)==1) $is_manager=1;


$mq=mysql_query("select * from project_managers where pid=".mysql_real_escape_string($pid));
$uq=mysql_query("select * from project_updates where pid=".mysql_real_escape_string($pid));
$dq=mysql_query("select * from project_devs where pid=".mysql_real_escape_string($pid));
echo("<div>");
echo("<h2>".mysql_result($pq,0,title)."</h2>");
echo("Primary manager: ".mysql_result($pq,0,pmid)."<br />");
echo("<pre>".mysql_result($pq,0,description)."</pre><br />");

for($z=0;$z<mysql_num_rows($mq);$z++){
	if(mysql_result($mq,$z,mid)!=mysql_result($pq,0,pmid)){
		if($z!=(mysql_num_rows($mq)-1)) $managers=$managers.r_manager(mysql_result($mq,$z,mid)).", ";
		else $managers=$managers.r_manager(mysql_result($mq,$z,mid))."";
	}
	if($z!=(mysql_num_rows($mq)-1)) $rewards=$rewards.mysql_result($mq,$z,reward)." ".mysql_result($mq,$z,reward_type).", ";
	else $rewards=$rewards.mysql_result($mq,$z,reward)." ".mysql_result($mq,$z,reward_type).".";
}
echo("Secondary contributors: ".$managers."<br>");
echo("Sum of rewards (in order of contributors): ".$rewards."<br />");

for($z=0;$z<mysql_num_rows($dq);$z++){
	if($z!=(mysql_num_rows($dq)-1)) $devs=$devs.r_dev(mysql_result($dq,$z,did)).", ";
	else $devs=$devs.r_dev(mysql_result($dq,$z,did))."";
}
echo("Devs: ".$devs."<br />");

for($z=0;$z<mysql_num_rows($uq);$z++){
	echo("<div><h3>".mysql_result($uq,$z,title)." by ".r_dev(mysql_result($uq,$z,did))." (".date('dS m y',mysql_result($uq,$z,timestamp)).")</h3><br />");
	echo("<pre>".mysql_result($uq,$z,description)."</pre>");
	echo("</div>");
}
if($is_manager) {
	$t = new element();
	$t->textbox("scripts/status_request.php",1);
}

echo("</div>");