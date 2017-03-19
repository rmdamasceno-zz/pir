<?php
	if (empty($_POST) || !isset($_POST['patchedit']   )){
		header("Location: /");
	}else{
		$pagereadmenutrue = '';
		$pagereadmenufalse ='';
		
		$contentedit = $_POST['patchedit'];
		//$contentedit = $_SERVER['DOCUMENT_ROOT']."/_help/content.php";
		
		include $contentedit.'content.php';	
		
		if ($readmenu == "yes"){ $pagereadmenutrue = 'checked';}else{$pagereadmenufalse = 'checked';};
		$pageacesslevel = $acesslevel;
		$pagetitle = $title;
		$pagemainconent = $mainconent;
		
		$thispatch = getcwd();
		require ($thispatch . "/content.php");
		require ($_SERVER['DOCUMENT_ROOT']."/_secur/valida.php");
		include ($_SERVER['DOCUMENT_ROOT']."/_layout/default.php");
	}
?>