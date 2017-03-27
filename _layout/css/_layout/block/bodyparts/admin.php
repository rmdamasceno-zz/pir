<?php
	//<?php echo $thispatch . '/content.php';
	if ( isset($_SESSION['hashpw']) && isset($_SESSION['user']) && !isset($noedit)){
		if (useradm($_SESSION['user'],$_SESSION['hashpw'])){
			echo "<form action='/plugin/editor/index.php' method='post'>
					<input type='hidden' name='patchedit' value='$thispatch/'></input>
					<button type='submit'>Editar Página</button>
				</form>";
		}
	}
?>