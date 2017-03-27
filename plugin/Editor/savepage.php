<?php
	if (!empty($_POST) && isset($_POST['content']) && isset($_POST['title']) && isset($_POST['menu']) && isset($_POST['page']) && isset($_POST['levelaccess'])){
		//echo $_POST['content'];
		//echo $_POST['title'];
		//echo $_POST['menu'];
		//echo $_POST['page'];
		//echo $_POST['levelaccess'];
		
		if ($_POST['menu'] == "1"){
			$menuenable = "yes";
		}else{
			$menuenable = "no";
		}
		$file = 'newpage.php';
		$bkfile = $_POST['page'].'content.php.bak';
		
		$cria = fopen("newpage.php", "w");
		fwrite($cria,'<?php');
		fwrite($cria,"\n	");
		fwrite($cria,'$acesslevel="'.$_POST['levelaccess'].'";');
		fwrite($cria,"\n	");
		fwrite($cria,'$readmenu="'.$menuenable.'";');
		fwrite($cria,"\n	");
		fwrite($cria,'$title="'.$_POST['title'].'";');
		fwrite($cria,"\n	");
		fwrite($cria,'$mainconent=\''.$_POST['content'].'\';');
		fwrite($cria,"\n");
		fwrite($cria,'?>');
		fclose($cria);
		copy($_POST['page']."content.php", $bkfile);
		copy($file, $_POST['page']."content.php");
		
		
		//$tamanhocommum =strlen (getcwd());
		//$comumpos = strripos(getcwd(),'\plugin\Editor');
		//$comumcur = ($tamanhocommum-$comumpos)*(-1);
		//$comum = strlen (substr(getcwd(), 0, $comumcur));
		
		//$tamanhostr = strlen ($_POST['page']."content.php");
		//$ultbarstr = strripos($_POST['page']."content.php", '/');
		//$cursor = ($tamanhostr-$ultbarstr)*(-1);
		
		//$patch = substr($_POST['page'], $comum, $cursor);

		echo "<body onload='window.history.go(-2);'>";
		//echo $_POST['page'];
		//echo "</br> possui $tamanhostr";
		//echo "</br> a ultima barra está em $ultbarstr";
		//echo "</br> o caminho padrão vai até $tamanhocommum" . getcwd();
		//echo "</br> o patch é $patch";
		
		
		//header("Location: ".$_POST['page']);
	}
	//echo "noPOST";
	//echo "</br>content ".$_POST['content'];
	//echo "</br>title ".$_POST['title'];
	//echo "</br>menu ".$_POST['menu'];
	//echo "</br>page ".$_POST['page'];
	//echo "</br>levelaccess ".$_POST['levelaccess'];
	//$readmenu="yes";
	//$title = "Editor de Páginas";
	//$mainconent = "<html>
?>