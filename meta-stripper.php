<!DOCTYPE html>
<html>
	<body>
		<form enctype = "multipart/form-data" action = "" method = POST >
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
			<input type = "file" name = "metaful-image"/>
			<input type = "submit"/>
		</form>
	</body>
</html>

<?php
if(!empty($_FILES['metaful-image'])
{
  include 'chromephp/ChromePhp.php';

  $uploaddir = '/usr/share/nginx/www/html/tmp/';
  $uploadfile = $uploaddir . basename($_FILES['metaful-image']['name']);

  echo '<pre>';
  if (move_uploaded_file($_FILES['metaful-image']['tmp_name'], $uploadfile)) {
      echo "File is valid, and was successfully uploaded.\n";
  } else {
      echo "Possible file upload attack!\n";
  }

  echo 'Here is some more debugging info:';
  print_r($_FILES);

  print "</pre>";
}
 ?>
