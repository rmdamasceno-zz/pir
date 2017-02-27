<?php
	$acesslevel="annonymous";
	$readmenu="no";
	$title = "Cadastro de Usuário";
	$mainconent = "	<form method='POST' action='cadastra.php'>
			<label>Primeiro Nome:</label><input type='text' name='nm_pri' id='nm_pri'><br>
			<label>Último Nome:</label><input type='text' name='sec_pri' id='sec_pri'><br>
			<label>CPF:</label><input type='text' name='cpf' id='cpf'><br>
			<label>Senha:</label><input type='password' name='pwd' id='sec_pri'><br>
			<label>Data de Nascinmento:</label><input type='text' name='nasc' id='calendario'><br>
			<label>Sexo: </label><input type='radio' name='gender' value='M' checked>Masculino <input type='radio' name='gender' value='F'>Feminino<br>
			<input type='submit' value='Cadastrar' id='cadastrar' name='cadastrar'>
		</form>";
?>