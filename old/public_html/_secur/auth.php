<?php
	if (empty($_POST)) {
		header('Location: \_logon');
	}else{
		if (!isset($_POST['uname']) && !isset($_POST['psw'])) {
			header('Location: \_logon');
		}else{
			if ( ! session_id() ) @ session_start();
			require ($_SERVER['DOCUMENT_ROOT']."/_functions/functions.php");
			$_SESSION['user'] = htmlspecialchars($_POST['uname']);
			$_SESSION['hpw'] = genpwhash($_POST['psw']);
			if (getpwhash($_SESSION['hpw'])){
				echo "<meta http-equiv='refresh' content='0;URL=\' />";
			}else{
				session_destroy();
				header('Location: \_logon');
			}
			
		}
	}
?>