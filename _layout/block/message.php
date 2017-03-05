<?php
	//if ($_SESSION['mes']<> ''){};
?>
		
<script>
// When the user clicks on <div>, open the popup
//function hmes1() {
    var messenger = document.getElementById("txpop");
    messenger.classList.toggle("showmtx");
//}
function hmes1() {
    var messenger = document.getElementById("txpop");
    messenger.classList.toggle("showmtx");
}
</script>
<div class='mtext' id='txpop' onclick="hmes1()">
	
		<?php echo $_SESSION['mes']; ?>

</div>