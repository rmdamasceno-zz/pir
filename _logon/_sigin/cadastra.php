<?php
	require ($_SERVER['DOCUMENT_ROOT']."/_secur/_con/connection.php");
	if (!empty($_POST) && isset($_POST['nm_pri']) && isset($_POST['sec_pri']) && isset($_POST['cpf']) && isset($_POST['pwd']) && isset($_POST['nasc']) && isset($_POST['gender'])){
		$query = "INSERT INTO pessoa(NM_PRI_PESSOA, NM_SEC_PESSOA, ID_CPF_PESSOA, TX_PWD_PESSOA, TX_SLT_PESSOA, DT_NSC_PESSOA, IN_SEX_PESSOA) 
		           VALUES (:nm_pri , :sec_pri , :cpf , :pwd , :salt , :nasc , :gender)";
		//echo $query."</br>";
		$query2 = "SELECT * FROM PESSOA WHERE ID_CPF_PESSOA=:cpf AND TX_PWD_PESSOA = :pwd";
		$values = array(
						':salt' => '0000',
						':nm_pri' => $_POST['nm_pri'],
						':sec_pri' => $_POST['sec_pri'],
						':cpf' => $_POST['cpf'],
						':pwd' => $_POST['pwd'],
						':nasc' => $_POST['nasc'],
						':gender' => $_POST['gender'],
					);
		$values2 = array(
						':pwd' => $_POST['pwd'],
						':cpf' => $_POST['cpf'],
					);
		QUERY_EXEC($query,$values,0);
		header("Location: /");
		//print_r (QUERY_EXEC($query2,$values2,1));
	}else{
		header("Location: sigin.php");
	}
	
?>