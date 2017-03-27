<nav id="nav-principal">
  <ul>
  	<li class='menutitle' onclick="menuhs()">MENU</li>
    <li class='menuitem'><a href="/">HOME</a></li>
    <li class='divisor'> | </li>
    <li class='menuitem'><a href="/_referenciados/">REFERENCIADOS</a></li>
    <li class='divisor'> | </li>
    <li class='menuitem'><a href="/_convites/">CONVITES</a></li>
    <li class='divisor'> | </li>
    <li class='menuitem'><a href="/_finances/">FINANCEIRO</a></li>
    <li class='divisor'> | </li>
    <li class='menuitem'><a href="/_help/">AJUDA</a></li>
  </ul>
  
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
﻿<script>
	var $ = jQuery;
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
