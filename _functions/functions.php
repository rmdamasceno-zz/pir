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
	function genkey(){
		$chlist = ".\abcdefghijklmnopqrstuvxzABCDEFGHIJKLMNOPQRSTUVXZ1234567890";
		$key = "";
		while (strlen($key)<255){
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
?>

