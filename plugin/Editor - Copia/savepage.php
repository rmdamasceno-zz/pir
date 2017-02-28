<?php
	if (!empty($_POST) && isset($_POST['content']) && isset($_POST['title']) && isset($_POST['menu']) && isset($_POST['page']) && isset($_POST['levelaccess'])){
		echo $_POST['content'];
		echo $_POST['title'];
		echo $_POST['menu'];
		echo $_POST['page'];
		echo $_POST['levelaccess'];
		
		if ($_POST['menu'] == "1"){
			$menuenable = "yes";
		}else{
			$menuenable = "no";
		}
		$file = 'newpage.php';
		$bkfile = $_POST['page'].'.bak';
		
		$cria = fopen("newpage.php", "w");
		fwrite($cria,'<?php');
		fwrite($cria,"\n	");
		fwrite($cria,'$acesslevel="'.$_POST['levelaccess'].'";');
		fwrite($cria,"\n	");
		fwrite($cria,'$readmenu="'.$_POST['menu'].'";');
		fwrite($cria,"\n	");
		fwrite($cria,'$title="'.$_POST['title'].'";');
		fwrite($cria,"\n	");
		fwrite($cria,'$mainconent=\''.$_POST['content'].'\';');
		fwrite($cria,"\n");
		fwrite($cria,'?>');
		fclose($cria);
		copy($_POST['page'], $bkfile);
		copy($file, $_POST['page']);
		
	}
	echo "noPOST";
	echo "</br>content ".$_POST['content'];
	echo "</br>title ".$_POST['title'];
	echo "</br>menu ".$_POST['menu'];
	echo "</br>page ".$_POST['page'];
	echo "</br>levelaccess ".$_POST['levelaccess'];
	//$readmenu="yes";
	//$title = "Editor de Páginas";
	//$mainconent = "<html>
?>