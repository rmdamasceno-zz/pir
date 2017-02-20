<?php
	$acesslevel="annonymous";
	$readmenu="no";
	$title = "Logon";
	$mainconent = "	<form action='\_secur\auth.php' method='post'>
					<div id='label'>LOGIN</div>
				 	<div class='container'>
			    	<label>Usuário:</label>
			    	<input type='text' placeholder='Digite seu usuário' name='uname' required>
					<p>
				    <label>Senha:</label>
				    <input type='password' placeholder='Digite a senha' name='psw' required>
					<p>
				    <span class='alterchar'><input type='checkbox' checked='checked'> Lembrar-se de mim</span>
				    </div>
					<div class='container'>
				    <button type='submit'>Entrar</button>
				    <span class='alterchar' id='restpwd'> <a href='#'>Esqueci minha senha</a></span>
				    </div>
					</form>";
?>