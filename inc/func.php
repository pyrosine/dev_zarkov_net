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
		if($o_title==1) echo("Title: <input type='text' name='title' size=32><p />");
		echo("<textarea style='width: 100%; height: 40px;' name='textarea'></textarea>");
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
		echo("<div class='form'><form method='post' action='sc.login.php' id='login' onsubmit='return validate();'>");
		echo("User: <input type='text' name='user'><p />");
		echo("Password: <input type='password' name='pass'><p />");
		echo("<input type='submit' value='Login'>");
		echo("</form></div>");
		echo("<a href='register.php'>Haven't registered?</a> <a href='lost.password.php'>Forgot your password?</a>");
	}
	function register(){
		echo("<script>
			function validate(){
				var F=document.getElementById('reg');
				if(F.user.value.length<3){alert('Bad username');return false;}
				if(F.pass.value.length<6){alert('Bad password');return false;}
				if(F.email.value.indexOf('@')<1 || F.email.value.lastIndexOf('.')<email_atpos+2 || F.email.value.lastIndexOf('.')+2>=email.length){alert('Bad email');return false;}
				if(F.pass.value!=F.r_pass.value){alert('Bad repeated password');return false;}");/*
					xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange=function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200) {
							user_taken=xmlhttp.responseText;
						}
					}
					xmlhttp.open('POST','scripts/register_ucheck.php',true);
					xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
					xmlhttp.send('username='+F.user.value);
				if(user_taken==1){return false;}*/echo("
				return true;
			}
		</script>");
		echo("<div class='form'><form method='post' action='scripts/register.php' onsubmit='return validate();' id='reg'>");
		echo("User: <input type='text' name='user'><p />");
		echo("Email: <input type='text' name='email'><p />");
		echo("Password: <input type='password' name='pass'><p />");
		echo("Repeat Password: <input type='password' name='r_pass'><p />");
		echo("<input type='submit' value='Register'>");
		echo("</form></div>");
	}
}