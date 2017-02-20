<?php 
	if ( ! session_id() ) @ session_start();
	require ($_SERVER['DOCUMENT_ROOT']."/_functions/functions.php");
	if ($acesslevel != "annonymous"){
		if ( ! isset($_SESSION['hpw'])){
			header('Location: \_logon');
		}
		if (!getpwhash($_SESSION['hpw'])){
			
		}
	}
?>