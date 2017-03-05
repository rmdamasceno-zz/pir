<div id='popup'>
	Bem Vindo <?php if ($_SESSION['sex']=='M'){echo 'Sr ';}else{ echo 'Sra ';}; echo $_SESSION['fname']; ?><span id='sair'><a href='/sair'>sair</a></span>
<!--</br>Seu acumulado atual é <a href='/_finances'>$ag</a>
</br>Seu seguro está <a href='/_seguro'>$stseg</a>
</br>-->
</div>