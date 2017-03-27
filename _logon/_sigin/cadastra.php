<?php
	if ( ! session_id() ) @ session_start();
	require ($_SERVER['DOCUMENT_ROOT']."/_functions/functions.php");
	require ($_SERVER['DOCUMENT_ROOT']."/_secur/_con/connection.php");
	if (!empty($_POST) && isset($_POST['nm_pri']) && isset($_POST['sec_pri']) && isset($_POST['cpf']) && isset($_POST['pwd']) && isset($_POST['nasc']) && isset($_POST['gender']) && isset($_POST['mail']) && isset($_POST['indicante'])){
		if (!validacpf($_POST['cpf'])){
			$errorlevel = 1;
			PRIVATESCANERROR();
		}
		$query = "INSERT INTO pessoa(NM_PRI_PESSOA, NM_SEC_PESSOA, ID_CPF_PESSOA, TX_PWD_PESSOA, TX_SLT_PESSOA, DT_NSC_PESSOA, IN_SEX_PESSOA, TX_COD_PESSOA, EMAIL_PESSOA, ID_RF1_PESSOA, ID_RF2_PESSOA) 
		           VALUES (:nm_pri , :sec_pri , :cpf , :pwd , :salt , STR_TO_DATE(:nasc, '%d/%m/%Y') , :gender, :cod, :mail, :indic1, :indic2)";
		//echo $query."</br>";
		$salt = genkey('255');
		do{
			$cod = genkey('12');
		}while(loccod($cod > 0));
		$indic1 = $_POST['indicante'];
		$pwd = genpwhash($_POST['pwd']);
		
		$query2 = "SELECT pessoa.ID_RF1_PESSOA FROM pessoa WHERE `TX_COD_PESSOA` = :indic1 AND ID_PESSOA > :idp";
		$values2 = array(
						':indic1' => $indic1,
						':idp' => '0',
					);
		$indic2 = QUERY_EXEC($query2,$values2,1);
		
		//$indic2 = "SELECT pessoa.ID_RF1_PESSOA FROM pessoa WHERE ID_RF1_PESSOA = :id_rf AND ID_PESSOA > :idp";
		//$valuesind = array(
		//				':id_rf' => $indic1,
		//				':idp' => 0,
		//			);
		//QUERY_EXEC($query,$values,0);
		
		$values = array(
						':salt' => $salt,
						':cod' => $cod,
						':nm_pri' => $_POST['nm_pri'],
						':sec_pri' => $_POST['sec_pri'],
						':cpf' => $_POST['cpf'],
						':pwd' => $pwd,
						':nasc' => $_POST['nasc'],
						':gender' => $_POST['gender'],
						':mail' => $_POST['mail'],
						':indic1' => $indic1,
						':indic2' => $indic2[0],
					);
		//$values2 = array(
		//				':indic1' => $indic1,
		///				':idp' => '0',
		//			);
		QUERY_EXEC($query,$values,0);
		$_SESSION['mes'] = 'Cadastro Efetuado!';
		header("Location: /");
		//echo $indic2[0];//(QUERY_EXEC($query2,$values2,1));
		//print_r($values);
		//echo "<br/>retorno>  ";
		//print_r(QUERY_EXEC($query2,$values2,1));
	}else{
		PRIVATESCANERROR();
	}
	function PRIVATESCANERROR(){
		if (empty($errorlevel)){
			//print_r($_POST);
			$_SESSION['mes'] = "";
			if (empty($_POST)){
				$_SESSION['mes'] = 'Preencha os campos corretamente!<br/>';
			}
			if (!isset($_POST['nm_pri'])){
				$_SESSION['mes'] = $_SESSION['mes'] . '=> Primeiro Nome<br/>';
			}
			if (!isset($_POST['sec_pri'])){
				$_SESSION['mes'] = $_SESSION['mes'] . '=> Último Nome<br/>';
			}
			if (!isset($_POST['cpf'])){
				$_SESSION['mes'] = $_SESSION['mes'] . '=> CPF<br/>';
			}
			if (!isset($_POST['pwd'])){
				$_SESSION['mes'] = $_SESSION['mes'] . '=> Senha<br/>';
			}
			if (!isset($_POST['nasc'])){
				$_SESSION['mes'] = $_SESSION['mes'] . '=> Data de Nascimento(dd/mm/aaaa)<br/>';
			}
			if (!isset($_POST['gender'])){
				$_SESSION['mes'] = $_SESSION['mes'] . '=> Sexo<br/>';
			}
			if (!isset($_POST['mail'])){
				$_SESSION['mes'] = $_SESSION['mes'] . '=> Email<br/>';
			}
			if (!isset($_POST['indicante'])){
				$_SESSION['mes'] = $_SESSION['mes'] . '=> Indicante<br/>';
			}
		}elseif($errorlevel = '1'){
			$_SESSION['mes'] = 'O CPF digitado está incorreto!';
		}else{
			$_SESSION['mes'] = 'Erro desconhecido! <br/>Por favor tente mais tarde.';
		}
		header("Location: /_logon/_sigin/");
	}
	
?>
