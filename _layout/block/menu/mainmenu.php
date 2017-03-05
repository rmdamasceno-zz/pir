<script>
	var menu=0;
	$(window).resize(function() {
        //var menu=1;
		if ($(window).width() < 534 ){
			$(".menuitem a").css("display", "none");
			var menu=0;
		}else{
			$(".menuitem a").css("display", "inline");
		}
		//menuhs();
    });
	function menuhs(){
		if (menu==0){
			$(".menuitem a").css("display", "block");
			menu=1;
		}else{
			$(".menuitem a").css("display", "none");
			menu=0;
		}
	}
</script>
<nav id="nav-principal">
  <ul>
  	<li class='menutitle' onclick="menuhs()">MENU</li>
    <li class='menuitem'><a href="/">HOME</a></li>
    <li class='divisor'> | </li>
    <li class='menuitem'><a href="/_referenciados/">REFERENCIADOS</a></li>
    <li class='divisor'> | </li>
    <li class='menuitem'><a href="/_convites/">CONVITES</a></li>
    <li class='divisor'> | </li>
    <li class='menuitem'><a href="/_finances/" id='123'>FINANCEIRO</a></li>
    <li class='divisor'> | </li>
    <li class='menuitem'><a href="/_help/" id='123'>AJUDA</a></li>
  </ul>
  
</nav>