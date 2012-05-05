<?php
class element{
	function textbox($r_action,$o_title){
		echo("<script>
			function validate(){
				var F=document.getElementById('login');
				if(F.user.value.length<3){return false;}
				if(F.pass.value.length<6){return false;}
				return true;
			}
		</script>");
		echo("<div class='form'><form method='post' action='$r_action'>");
		echo("<input type='hidden' name='user' value='$did'>");
		if($o_title==1) echo("Title: <input type='text' name='title' size=32><br />");
		echo("<textarea style='width: 100%; height: 40px;'></textarea>");
		echo("<input type='button' value='Post'>");
		echo("</form></div>");
	}
	function login(){
		echo("<script>
			function validate(){
				var F=document.getElementById('login');
				if(F.user.value.length<3){return false;}
				if(F.pass.value.length<6){return false;}
				return true;
			}
		</script>");
		echo("<div class='form'><form method='post' action='scripts/login.php' id='login' onsubmit='return validate();'>");
		echo("User: <input type='text' name='user'><br/>");
		echo("Password: <input type='password' name='pass'><br />");
		echo("<input type='button' value='Login'>");
		echo("</form></div>");
	}
	function register(){
		echo("<script>
			function validate(){
				var F=document.getElementById('reg');
				if(F.user.value.length<3){return false;}
				if(F.pass.value.length<6){return false;}
				if(F.email.value.indexOf('@')<1 || F.email.value.lastIndexOf('.')<email_atpos+2 || F.email.value.lastIndexOf('.')+2>=email.length){return false;}
				if(F.pass.value!=F.r_pass.value){return false;}
					xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange=function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200) {
							user_taken=xmlhttp.responseText;
						}
					}
					xmlhttp.open('POST','scripts/register_ucheck.php',true);
					xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
					xmlhttp.send('username='+F.user.value);
				if(user_taken==1){return false;}
				return true;
			}
		</script>");
		echo("<div class='form'><form method='post' action='scripts/register.php' onsubmit='return validate()' id='reg'>");
		echo("User: <input type='text' name='user'><br/>");
		echo("Email: <input type='text' name='email'><br/>");
		echo("Password: <input type='password' name='pass'><br />");
		echo("Repeat Password: <input type='password' name='r_pass'><br />");
		echo("<input type='button' value='Register'>");
		echo("</form></div>");
	}
}