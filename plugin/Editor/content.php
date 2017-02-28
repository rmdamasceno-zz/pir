<?php
	$noedit = "1";
	$acesslevel="user";
	$readmenu="yes";
	$title="Editor de Páginas";
	$mainconent="
	<head>
		<script src='js/tinymce.min.js'></script>
		<script>
			tinymce.init({
				selector: 'textarea',  // change this value according to your HTML
				resize: true,
			    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
				menu: {
					file: {title: 'File', items: 'newdocument'},
					edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
					insert: {title: 'Insert', items: 'link media | template hr'},
					view: {title: 'View', items: 'visualaid spellchecker code'},
					format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
					table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
					tools: {title: 'Tools', items: 'link image'}
				},
				plugins:[
							'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
							'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
							'save table contextmenu directionality emoticons template paste textcolor'
						]
			});
		</script>
	</head>
	<body>
		<form method='post' action='savepage.php'>
			<input type='hidden' name='page' value='$contentedit'></input>
			<textarea id='mytextarea' name='content'>$pagemainconent</textarea>
			<p><label>Título da Página: </label><input type='text' name='title' value='$pagetitle'></input></p>
			<p><label>Nível de Acesso: </label><input type='text' name='levelaccess' value='$pageacesslevel'></input></p>
			<p><label>Habilita Menu? </label><input type='radio' name='menu' value='1' $pagereadmenutrue> SIM </input><input type='radio' name='menu' value='0' $pagereadmenufalse> NÃO</input></p>
			<p><button type='submit'>Salvar</button></p>
		</form>
	</body>
	";
?>