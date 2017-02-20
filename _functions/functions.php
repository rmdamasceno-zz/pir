<?php
	//função para gerar hash da senha
	function genpwhash($pwd){
		$phash = crypt($pwd, '$2a$07$cGlyYW1pZGVkb2NvcmluZ2E=$');
		return $phash;
	}
	
	//função para comparar hash da senha digitada e da senha correta
	function getpwhash($hpwd){
		return hash_equals($hpwd, '$2a$07$cGlyYW1pZGVkb2NvcmluZuO8B7ZqYEhIL3o7AMPnxOyXgOobaqvAO');
		/*return password_verify($hpwd,'$2a$07$cGlyYW1pZGVkb2NvcmluZuOb7Vhaw0orSGUVxR2k9A2M4kandzHRK');*/
	}
	
	//função de encriptar hash
	function encriptar($hashpw,$user,$key){
		//$key = achakey($user);
		$phash = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,md5($key),$hashpw,MCRYPT_MODE_CBC,md5(md5($key))));
		return $phash;
	}
	
	//função para descriptar hash
	function descriptar($phash,$user,$key){
		//$key = achakey($user);
		$hashpw = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,md5($key),base64_decode($phash),MCRYPT_MODE_CBC,MD5(MD5($key))),"\0");
		return $hashpw;
	}
	
	//função achakey
	function achakey($user){
		return "agwjd892gbnkjb87";
	}
	
	//função para gerar SALT
	function genkey(){
		$chlist = ".\abcdefghijklmnopqrstuvxzABCDEFGHIJKLMNOPQRSTUVXZ1234567890/,";
		$key = "";
		while (strlen($key)<4096){
			$key .= substr($chlist,rand(0,strlen($chlist)),1);
		}
		return $key;
	}
?>

