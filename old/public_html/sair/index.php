<?php
	require ($_SERVER['DOCUMENT_ROOT']."/_secur/valida.php");
	session_destroy();
	header('Location: \_logon');
?>