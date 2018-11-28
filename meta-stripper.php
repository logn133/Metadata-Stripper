<?php
include 'chromephp/ChromePhp.php';
// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.

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
#	$uploadDir = '/usr/share/nginx/www/html/tmp/';
#	$originalFileName = basename($_FILES['metaful-image']['name']);
#	$originalFileTMPName = basename($_FILES['metaful-image']['tmp_name']);
#	$uploadFile = "$uploadDir$originalFileName";
#	print($uploadFile);
#	ChromePhp::log($_FILES);
#	ChromePhp::log($uploadFile);
#
#	if (ChromePhp::log(move_uploaded_file($originalFileName, $uploadFile))) {
#		echo "\nfukn done\n";
#	}
#	else {
#		echo "\nnah\n";
#	}
#	print_r($_SESSION)
#	print_r($_FILES);
	#echo '<img src= '$_FILES['metaful-image']['tmp_name']' height='auto' width='auto' />';
	#unlink($_FILES);
	#unlink($uploadFile);
	#unlink($_FILES['metaful-image']['name']);
 ?>

<html>
	<body>
		<form enctype = "multipart/form-data" action = "" method = POST >
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
			<input type = "file" name = "metaful-image"/>
			<input type = "submit"/>
		</form>
	</body>
</html>
