<?php
	$thispatch = getcwd();
	require ($thispatch . "/content.php"); 
?>
<html>
<head>
  <!--<script src='//cloud.tinymce.com/stable/tinymce.min.js'></script>!-->
  <script src='C:\PHP\www\pir\plugin\tinymce_4.5.3_dev\tinymce\Gruntfile.js'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>
</head>

<body>
  <form method="post">
    <textarea id="mytextarea"><?php echo ($mainconent); ?></textarea>
  </form>
</body>
</html>