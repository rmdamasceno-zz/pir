<?php 
	if ( !session_id() ) @ session_start();
	require ($_SERVER['DOCUMENT_ROOT']."/_secur/_con/connection.php");
	require ($_SERVER['DOCUMENT_ROOT']."/_functions/functions.php");
	if (!isset($acesslevel) || $acesslevel != "annonymous"){
		if ( !isset($_SESSION['hashpw']) && !isset($_SESSION['user'])){
			header('Location: \_logon ');
		}
		if (!getpwhash($_SESSION['hashpw'],$_SESSION['user'])){
			
		}
	}
?>