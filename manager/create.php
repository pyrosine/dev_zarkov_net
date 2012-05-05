<?php
include("inc.user.php");

include("../inc/header.php");
include("inc.menu.php");
echo("<script>
	function validate(){
		var F=document.getElementById('cre');
		if(F.title.value.length<3){return false;}
		if(F.textarea.value.length<10){return false;}
		return true;
	}
</script>");


echo("<h2>Starting a new project</h2><p>");
echo("<div class='form'><form method='post' action='sc.create.php' name='cre' onsubmit='return validate();'>");
echo("Title: <input type='text' name='title'><br />Describe your project:<br />");
echo("<textarea style='width: 100%; height: 40px;' name='textarea'></textarea><p />");

echo("What do you want to offer as an incentive? Set an amount and the reward. We'd reccomend 5 GBP, but it can really be whatever you have to offer. Nothing is an option, but not too many devs will be motivated to go pro-bono. Leave the fields blank if that's what you want. It's up to you.<br />");
echo("<input type='text' name='reward' size=2 value=5> of <input type='text' name='reward_type' value='GBP'><p />");

echo("Set an application deadline (how about 2 weeks from now?): <input type='text' value='".date('d',time()+604800)."' name='a_dd' size=2>-<input type='text' value='".date('m',time()+604800)."' name='a_mm' size=2>-<input type='text' value='".date('y',time()+604800)."' name='a_yy' size=2><br />");
echo("Set a project deadline (4 weeks?): <input type='text' value='".date('d',time()+1209600)."' name='p_dd' size=2>-<input type='text' value='".date('m',time()+1209600)."' name='p_mm' size=2>-<input type='text' value='".date('y',time()+1209600)."' name='p_yy' size=2><p />");

echo("Make it private? <input type='checkbox' name='private' value=1> (requires a &pound;1 charge, we want to encourage openness here - well, that and it helps cover costs (that's all fine and dandy, but <a href='../inc/faq.php?topic=private' target='_blank'>what does it mean?</a>))<p />");

echo("<input type='button' value='Save and view before posting'>");
echo("</form></div>");