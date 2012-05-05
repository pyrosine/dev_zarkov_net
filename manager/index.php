<?php
include("inc.user.php");

include("../inc/header.php");
include("inc.menu.php");

echo("<h2>Current Projects:</h2>"."<div><table><tr><th>Project title</th><th>Your role</th><th>Deadline</th></tr>");
$q=mysql_query("select project_managers.*,projects.* where project_managers.,mid=$mid and projects.id=project_managers.pid and projects.active=1");
for($z=0;$z<mysql_num_rows($q);$z++){
	echo("<tr><td>".mysql_result($q,$z,projects.title)."</td><td>".mysql_result($q,$z,project_managers.role)."</td><td>".date('dS m y',mysql_result($q,$z,projects.deadline))."</td></tr>");
}
echo("</div><hr>");

