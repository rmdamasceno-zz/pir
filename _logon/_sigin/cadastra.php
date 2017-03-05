<?php
	require ($_SERVER['DOCUMENT_ROOT']."/_functions/functions.php");
	require ($_SERVER['DOCUMENT_ROOT']."/_secur/_con/connection.php");
	if (!empty($_POST) && isset($_POST['nm_pri']) && isset($_POST['sec_pri']) && isset($_POST['cpf']) && isset($_POST['pwd']) && isset($_POST['nasc']) && isset($_POST['gender'])){
		$query = "INSERT INTO pessoa(NM_PRI_PESSOA, NM_SEC_PESSOA, ID_CPF_PESSOA, TX_PWD_PESSOA, TX_SLT_PESSOA, DT_NSC_PESSOA, IN_SEX_PESSOA, TX_COD_PESSOA) 
		           VALUES (:nm_pri , :sec_pri , :cpf , :pwd , :salt , STR_TO_DATE(:nasc, '%m/%d/%Y') , :gender, :cod)";
		//echo $query."</br>";
		$salt = genkey('255');
		do{
			$cod = genkey('12');
		}while(loccod($cod > 0));
		$pwd = genpwhash($_POST['pwd']);
		$query2 = "SELECT * FROM PESSOA WHERE ID_CPF_PESSOA=:cpf AND TX_PWD_PESSOA = :pwd";
		$values = array(
						':salt' => $salt,
						':cod' => $cod,
						':nm_pri' => $_POST['nm_pri'],
						':sec_pri' => $_POST['sec_pri'],
						':cpf' => $_POST['cpf'],
						':pwd' => $pwd,
						':nasc' => $_POST['nasc'],
						':gender' => $_POST['gender'],
					);
		$values2 = array(
						':pwd' => $_POST['pwd'],
						':cpf' => $_POST['cpf'],
					);
		QUERY_EXEC($query,$values,0);
		header("Location: /");
		//echo $salt;//(QUERY_EXEC($query2,$values2,1));
	}else{
		header("Location: sigin.php");
	}
	
?>
