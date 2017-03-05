<?php
	if (empty($_POST)) {
		header('Location: \ ');
	}else{
		if (!isset($_POST['user']) && !isset($_POST['pass'])) {
			header('Location: \ ');
		}else{
			if ( ! session_id() ) @ session_start();
			require ($_SERVER['DOCUMENT_ROOT']."/_secur/_con/connection.php");
			require ($_SERVER['DOCUMENT_ROOT']."/_functions/functions.php");
			
			$_SESSION['user'] = $_POST['user'];
			$hashpw = genpwhash($_POST['pass']);
			//$salt = achakey($_SESSION['user']);
			//echo "ok</br>usuario do post= ".$_POST['user']."</br>usuario do $|user = ".$_SESSION['user'];
			//echo "</br></br></br>SALT = ".$salt."</br></br></br>";
			//echo "</br>senha do post= ".$_POST['pass']."</br>senha do $|hashpw = ".$hashpw;
			
			$_SESSION['hashpw'] = encriptar($hashpw,$_SESSION['user']);
			//echo "</br>senha do $|hashpw encriptada = ".$_SESSION['hashpw'];
			//$hashpw = descriptar($_SESSION['hashpw'],$_SESSION['user'],$salt);
			//echo "</br>senha do $|hashpw decriptada = ".$hashpw;
			
			if (getpwhash($hashpw,$_SESSION['user'])){
				$_SESSION['mes'] = 'logado';
				echo "<meta http-equiv='refresh' content='0;URL=\' />";
				//echo "</br></br></br>A senha foi validada como correta!";
			}else{
				session_destroy();
				header('Location: \_logon');
				//echo "</br></br></br>A senha foi validada como INcorreta!";
			}
		}
	}
?>