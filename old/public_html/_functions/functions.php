<?php
	function genpwhash($pwd){
		$phash = crypt($pwd, '$2a$07$cGlyYW1pZGVkb2NvcmluZ2E=$');
		return $phash;
	}
	function getpwhash($hpwd){
		return hash_equals($hpwd, '$2a$07$cGlyYW1pZGVkb2NvcmluZuOb7Vhaw0orSGUVxR2k9A2M4kandzHRK');
		/*return password_verify($hpwd,'$2a$07$cGlyYW1pZGVkb2NvcmluZuOb7Vhaw0orSGUVxR2k9A2M4kandzHRK');*/
	}

?>

