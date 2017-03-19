<?php
	//função para gerar hash da senha
	function genpwhash($pwd){
		$phash = crypt($pwd, '$2a$07$cGlyYW1pZGVkb2NvcmluZ2E=$');
		return $phash;
	}
	
	//função para comparar hash da senha digitada e da senha correta
	function getpwhash($hpwd,$user){
		$pwd = getpwd($user);
		//echo '</br> retorno do getpw em getpwhash  '.$pwd;
		//caso um usuário seja removido e esteja logado, o mesmo será desconectado
		if ($pwd == ''){ return false;};
		return hash_equals($hpwd, $pwd);
		/*return password_verify($hpwd,'$2a$07$cGlyYW1pZGVkb2NvcmluZuOb7Vhaw0orSGUVxR2k9A2M4kandzHRK');*/
	}
	
	//função de encriptar hash
	function encriptar($hashpw,$user){
		$key = achakey($user);
		$phash = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,md5($key),$hashpw,MCRYPT_MODE_CBC,md5(md5($key))));
		return $phash;
	}
	
	//função para descriptar hash
	function descriptar($phash,$user){
		$key = achakey($user);
		$hashpw = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,md5($key),base64_decode($phash),MCRYPT_MODE_CBC,MD5(MD5($key))),"\0");
		return $hashpw;
	}
	
	//função achakey
	function achakey($user){
		$query = "SELECT TX_SLT_PESSOA FROM PESSOA WHERE ID_CPF_PESSOA = :user AND ID_PESSOA > :id";
		$values = array(
			':user' => $user,
			':id' => 1,
		);
		$result = QUERY_EXEC($query,$values,1);
		return $result[0];
	}
	
	//função para gerar SALT
	function genkey($len){
		$chlist = "";
		$key = "";
		if ($len>25){
			$chlist = ".\a";
		}
		$chlist = $chlist."bcdefghijklmnopqrstuvxzABCDEFGHIJKLMNOPQRSTUVXZ1234567890";
		while (strlen($key)<$len){
			$key .= substr($chlist,rand(0,strlen($chlist)),1);
		}
		return $key;
	}
	
	function getpwd($user){
		$query = "SELECT TX_PWD_PESSOA FROM pessoa WHERE ID_CPF_PESSOA = :user AND ID_PESSOA > :id";
		$values = array(
			':user' => $user,
			':id' => 1,
		);
		//echo '</br> user em getpw '.$user;
		$result = QUERY_EXEC($query,$values,1);
		//print_r ($result);
		return $result[0];
	}
	function useradm($user,$pas){
		if (!getpwhash($pas,$user)){
			$query = "SELECT count(administrador.ID_ADMINISTRADOR) FROM pessoa, administrador WHERE pessoa.ID_CPF_PESSOA = :user AND pessoa.ID_PESSOA > :id AND pessoa.ID_PESSOA = administrador.ID_PESSOA_ADMINISTRADOR";
			$values = array(
				':user' => $user,
				':id' => 1,
			);
		}
		
		$result = QUERY_EXEC($query,$values,1);
		//return $result[0];
		if ($result[0] == 1){
			return true;
		}else{
			return false;
		}
	}
	function loccod($cod){
		$query = "SELECT count(1) FROM pessoa WHERE TX_COD_PESSOA = :cod AND ID_PESSOA > :id";
		$values = array(
			':cod' => $cod,
			':id' => 1,
		);
		$result = QUERY_EXEC($query,$values,1);
		return $result[0];
	}
	function parsession($user){
		$query = "SELECT NM_PRI_PESSOA, NM_SEC_PESSOA, IN_SEX_PESSOA, TX_COD_PESSOA FROM pessoa WHERE ID_CPF_PESSOA = :user AND ID_PESSOA > :id";
		$values = array(
			':user' => $user,
			':id' => 1,
		);
		$result = QUERY_EXEC($query,$values,1);
		$_SESSION['fname'] = $result[0];
		$_SESSION['lname'] = $result[1];
		$_SESSION['code'] = $result[3];
		$_SESSION['sex'] = $result[2];
	}
	function validacpf($cpf){
        $sum = 0;
		$remove = array(".", "-");
		$inclui = array("", "");

        $cpf = str_replace($remove, $inclui, $cpf);
            
		if(strlen($cpf) != 11 || 
			$cpf == "00000000000" ||
            $cpf == "11111111111" ||
            $cpf == "22222222222" ||
            $cpf == "33333333333" ||
            $cpf == "44444444444" ||
            $cpf == "55555555555" ||
            $cpf == "66666666666" ||
            $cpf == "77777777777" ||
            $cpf == "88888888888" ||
            $cpf == "99999999999"){ 
			return false;
		}
        for ($i = 1; $i <= 9; $i++){
            $sum = $sum + intval(substr ($cpf, $i - 1, $i)) * (11 - $i);
		}
        $remainder = ($sum * 10) % 11;

        if (($remainder == 10) || ($remainder == 11))
            $remainder = 0;
        if ($remainder != intval(substr ($cpf,9, 10)))
            return false;

        $sum = 0;
        for ($i = 1; $i <= 10; $i++)
            $sum = $sum + intval(substr ($cpf, $i - 1, $i)) * (12 - $i); $remainder = ($sum * 10) % 11;

        if (($remainder == 10) || ($remainder == 11))
            $remainder = 0;
        if ($remainder != intval(substr ($cpf, 10, 11)))
            return false;
        return true;
	}
?>

