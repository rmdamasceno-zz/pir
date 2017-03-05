<?php
	function QUERY_EXEC ($query,$values,$method){
		try{
			$conn = new PDO('mysql:host=localhost;dbname=thejo428_pc', 'root', '');
		}catch(PDOException $e){
			echo "<script>alert('Erro interno de Conexão!');history.go(-1) </script>";
		}
		try{
			//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare($query);
			$stmt->execute($values); 
		}catch(PDOException $e){
			echo "<script>alert('Erro na requisição ao BD');history.go(-1) </script>";
		}
		///method = 1 => consulta 
		if ($method = 1) {
			try{
				while($row = $stmt->fetch()) {
					return $row;
				}
			}catch(PDOException $e){
				echo "<script>alert('Erro ao retornar os dados solicitados');history.go(-1) </script>";
			}
		}
	}

?>