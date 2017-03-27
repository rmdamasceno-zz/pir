<?php 
	$contentedit = $_SERVER['DOCUMENT_ROOT']."/_help/content.php";
	include $contentedit;
	//echo $mainconent;
?>

<html>
	<head>
		<title> TESTE Editor HTML</title>
		<script src='js/tinymce.min.js'></script>
		<script>
			tinymce.init({
				selector: 'textarea',  // change this value according to your HTML
				resize: false,
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
		<form method="post">
			<textarea id="mytextarea"><?php echo $mainconent; ?></textarea>
			<button type="submit">Salvar</button>
		</form>
	</body>
</html>