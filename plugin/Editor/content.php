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
				table_advtab: true,
				image_advtab: true,
				paste_data_images: true,
				paste_as_text: true,
				imagetools_toolbar: 'rotateleft rotateright | flipv fliph | editimage imageoptions',
			    toolbar: 'fullpage codesample insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media | forecolor backcolor',
				insertdatetime_dateformat: '%d-%m-%Y',
				contextmenu: 'link image inserttable | cell row column deletetable',
				menu: {
					file: {title: 'File', items: 'newdocument'},
					edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall searchreplace'},
					insert: {title: 'Insert', items: 'nonbreaking pagebreak | link image media | template hr | insertdatetime'},
					view: {title: 'View', items: 'visualchars visualblocks visualaid code fullscreen'},
					format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
					table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
					tools: {title: 'Tools', items: ''}
				},
				plugins:[
							'textcolor colorpicker advlist autolink link image lists charmap preview hr anchor pagebreak',
							'legacyoutput contextmenu searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
							'layer imagetools hr fullpage codesample save table contextmenu directionality emoticons template paste textcolor'
				],
				codesample_languages: [
					{text: 'HTML/XML', value: 'markup'},
					{text: 'JavaScript', value: 'javascript'},
					{text: 'CSS', value: 'css'},
					{text: 'PHP', value: 'php'},
					{text: 'Ruby', value: 'ruby'},
					{text: 'Python', value: 'python'},
					{text: 'Java', value: 'java'},
					{text: 'C', value: 'c'},
					{text: 'C#', value: 'csharp'},
					{text: 'C++', value: 'cpp'}
				],
				link_list: [
					{title: 'My page 1', value: 'http://www.tinymce.com'},
					{title: 'My page 2', value: 'http://www.ephox.com'}
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