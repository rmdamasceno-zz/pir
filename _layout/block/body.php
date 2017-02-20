<body>
<header>
	<a href="<?php echo $maindom;?>"><?php echo $maintitle;?></a>
</header>
<?php
		if($acesslevel!="annonymous"){
			include ($_SERVER['DOCUMENT_ROOT']."/_layout/block/bodyparts/popup.php");
		}
?>

<!--menu inicio-->

<?php	
		if ($readmenu=="yes"){
	 		include ($_SERVER['DOCUMENT_ROOT']."/_layout/block/menu/mainmenu.php");
		}
?>

<!--menu fim-->

<section> 
	<div id='grade'>
		<?php	
			if ($readmenu=="yes"){
 		   		echo "<div id='content'>";
			}else{
				echo "<div id='nocontent'>";
			}
			echo $mainconent;
    	?>
					
		</div>
    </div>
</section>
<footer>
	<?php	include ($_SERVER['DOCUMENT_ROOT']."/_layout/block/bodyparts/footer.php");	?>
</footer>
</body>
