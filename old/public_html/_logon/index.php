<?php
	$thispatch = getcwd();
	require ($thispatch . "/content.php");
	require ($_SERVER['DOCUMENT_ROOT']."/_secur/valida.php");
	include ($_SERVER['DOCUMENT_ROOT']."/_layout/default.php");
?>