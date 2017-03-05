<?php 
if ( !session_id() ) @ session_start();
	require ($_SERVER['DOCUMENT_ROOT']."/_secur/_con/connection.php");
	require ($_SERVER['DOCUMENT_ROOT']."/_functions/functions.php");
	$exit = useradm($_SESSION['user'],$_SESSION['hashpw']);
	print_r ($exit);
?>