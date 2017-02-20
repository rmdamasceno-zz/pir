<?php
	require ($_SERVER['DOCUMENT_ROOT']."/_declare/declare.php");
	
	if ($title <> "") {
		$localtitle = $defaultseparator . $title;
	}else{
		$localtitle = "";
	}
	echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>";
	include ($_SERVER['DOCUMENT_ROOT']."/_layout/block/head.php");
	include ($_SERVER['DOCUMENT_ROOT']."/_layout/block/body.php");
?>