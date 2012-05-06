<?php
include("inc.user.php");
echo("TESTING");
include("../inc/header.php");
include("inc.menu.php");

echo("<h2>Current Projects:</h2>"."<div><table><tr><th>Project title</th><th>Your role</th><th>Your deadline</th></tr>");
$q=mysql_query("select project_devs.*,projects.* where project_devs.did=$did and projects.id=project_devs.pid and projects.active=1");
for($z=0;$z<mysql_num_rows($q);$z++){
	echo("<tr><td>".mysql_result($q,$z,projects.title)."</td><td>".mysql_result($q,$z,project_devs.role)."</td><td>".date('dS m y',mysql_result($q,$z,project_devs.ETA))."</td></tr>");
}
echo("</div><hr>");

echo("<h2>Open Projects:</h2>"."<div><table><tr><th>Project title</th><th>Date created</th><th>Deadline for applications</th><th>To be finished before</th></tr>");
$q2=mysql_query("select * from projects where active=1");
for($z=0;$z<mysql_num_rows($q2);$z++){
	echo("<tr><td>".mysql_result($q2,$z,title)."</td><td>".date('dS m y',mysql_result($q,$z,timestamp))."</td><td>".date('dS m y',mysql_result($q,$z,deadline_application))."</td><td>".date('dS m y',mysql_result($q,$z,deadline))."</td></tr>");
}
echo("</div><hr>");
