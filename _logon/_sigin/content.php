<?php
	if ( ! session_id() ) @ session_start();
	if (!empty($_SESSION) && isset($_SESSION['mes']) && $_SESSION['mes'] <> ""){
		$mensagem = $_SESSION['mes'];
	}else{
		$mensagem = "";
		$_SESSION['mes'] = "";
	};
	session_destroy();
	$acesslevel="annonymous";
	$readmenu="no";
	$title = "Cadastro de Usuário";
	$mainconent = '	<form method="POST" action="cadastra.php" id="formCadastro">
  <table class="tableCadastro" id="maintableCadastro">
	<th colspan="6">Cadastro Para Novos Usuários</th>
    <tr><td colspan="6" id="idmenssagem">'.$mensagem.'</td></tr>
    <tr><td colspan="6" class="tdcaption">Dados Pessoais</td></tr>
    <tr><td colspan="1" class="tdleft"><label>Primeiro Nome:</label></td><td colspan="2"><input type="text" name="nm_pri" id="nm_pri" required></td>
    <td colspan="1" class="tdleft"><label>Último Nome:</label></td><td colspan="2"><input type="text" name="sec_pri" id="sec_pri" required></td></tr>
    <tr><td colspan="1" class="tdleft"><label>CPF:</label></td><td colspan="2"><input name="cpf" minlength="11" maxlength="11" type="text" size="13" required onBlur="if(!validate(this.value)){alert('.Chr(39).' CPF Inválido! Corrija!'.Chr(39).');this.value ='.Chr(39).''.Chr(39).';}" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/></td>
    <td colspan="1" class="tdleft"><label>Data de Nascinmento:</label></td><td colspan="2"><input type="text" name="nasc" id="calendario" required></td></tr>
    <tr><td colspan="1" class="tdleft"><label>Sexo: </label></td><td colspan="2"><input type="radio" name="gender" value="M" checked>Masculino <br /><input type="radio" name="gender" value="F">Feminino</td><td colspan="3" class="tdleft"></td></tr>
    <tr><td colspan="6" class="tdcaption">Dados de Cadastro</td></tr>
    <tr><td colspan="1" class="tdleft"><label>Email: </label></td><td colspan="2"><input type="email" name="mail" id="mail" required></td><td colspan="1" class="tdleft"><label>Senha: </label></td><td colspan="2"><input minlength="8" type="password" name="pwd" id="sec_pri" required></td></tr>
    <tr><td colspan="3" class="tdleft"><label>Codigo do Indicante: </label></td><td colspan="3"><input minlength="12" maxlength="12" type="text" size="13" required name="indicante" id="indicante" class="full"></td></tr>
   <tr><td colspan="6" id="button"><input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar" class="full"></td></tr>
</table>
</form><script async="async" language="javascript" >
function validate(a){var c,b=0;if(a=a.replace(".","").replace(".","").replace("-","").trim(),11!=a.length||"00000000000"==a||"11111111111"==a||"22222222222"==a||"33333333333"==a||"44444444444"==a||"55555555555"==a||"66666666666"==a||"77777777777"==a||"88888888888"==a||"99999999999"==a)return!1;for(i=1;i<=9;i++)b+=parseInt(a.substring(i-1,i))*(11-i);if(c=10*b%11,10!=c&&11!=c||(c=0),c!=parseInt(a.substring(9,10)))return!1;for(b=0,i=1;i<=10;i++)b+=parseInt(a.substring(i-1,i))*(12-i);return c=10*b%11,10!=c&&11!=c||(c=0),c==parseInt(a.substring(10,11))}
</script>';
?>