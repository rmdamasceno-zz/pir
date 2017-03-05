<?php
	//função para gerar hash da senha
	function genpwhash($pwd){
		$phash = crypt($pwd, '$2a$07$cGlyYW1pZGVkb2NvcmluZ2E=$');
		return $phash;
	}
	
	//função para comparar hash da senha digitada e da senha correta
	function getpwhash($hpwd,$user){
		$pwd = getpwd($user);
		//echo $pwd;
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
		$query = "SELECT TX_PWD_PESSOA FROM PESSOA WHERE ID_CPF_PESSOA = :user AND ID_PESSOA > :id";
		$values = array(
			':user' => $user,
			':id' => 1,
		);
		$result = QUERY_EXEC($query,$values,1);
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
		$query = "SELECT count(1) FROM PESSOA WHERE TX_COD_PESSOA = :cod AND ID_PESSOA > :id";
		$values = array(
			':cod' => $cod,
			':id' => 1,
		);
		$result = QUERY_EXEC($query,$values,1);
		return $result[0];
	}
	function parsession($user){
		$query = "SELECT NM_PRI_PESSOA, NM_SEC_PESSOA, IN_SEX_PESSOA, TX_COD_PESSOA FROM PESSOA WHERE ID_CPF_PESSOA = :user AND ID_PESSOA > :id";
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
?>

