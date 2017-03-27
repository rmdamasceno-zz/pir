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
	$title="Logon";
	$mainconent='<form action="\_secur\auth.php" method="post" id="formLogin">
 <table class="tableLogin" id="maintableLogin"><th colspan="3">LOGIN</th>
		<tr><td colspan="3" id="idmenssagem">'.$mensagem.'</td></tr>
        <tr><td colspan="1" class="tdleft"><label>CPF: </label></td><td colspan="2"><input name="user"  maxlength="11" type="text" placeholder="  =&gt; CPF &lt;=" size="13" required onkeypress="return event.charCode >= 48 && event.charCode <= 57"/></td></tr>
        <tr><td colspan="1" class="tdleft"><label>SENHA: </label></td><td colspan="2"><input name="pass" required type="password" placeholder="  =&gt; SENHA &lt;=" size="13" /></td></tr>
        <tr><td colspan="3"><button type="submit">Entrar</button><a href="#">Esqueci minha senha</a></td></tr>
 </table>
</form>';
?>