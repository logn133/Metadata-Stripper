<!DOCTYPE html>
<html>
	<body>
		<form enctype = "multipart/form-data" action = "#" method = POST >
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
			<input type = "file" name = "metaful-image"/>
			<input type = "submit"/>
		</form>
    <form action="/meta-stripper.php">
      <input type = "submit" value="Reset">
    </form>
	</body>
</html>

<?php
  include 'chromephp/ChromePhp.php';
  if(!empty($_FILES['metaful-image']['name']))
  {

    $uploaddir = '/usr/share/nginx/html/tmp/';
    $uploadfile = $uploaddir . basename($_FILES['metaful-image']['name']);
    $originalOnlineDir = "tmp/" . $_FILES['metaful-image']['name'];

    echo '<pre>';
    if (move_uploaded_file($_FILES['metaful-image']['tmp_name'], $uploadfile)) {
        ChromePhp::log("File is valid, and was successfully uploaded.\n");
    } else {
        ChromePhp::log("Possible file upload attack!\n");
    }
    ChromePhp::log('Here is some more debugging info:');
    ChromePhp::warn($_FILES);
    print "</pre>";

    print "<img src='$originalOnlineDir' width='20%' height='20%'/>";
    $exif = exif_read_data($uploadfile, 0, true);
    if(!empty($exif)) {
      print "<form action='#'>";
      print "<p>";
      print "Please select the metadata tags you wish to remove...";
      print "<ol>";
      foreach ($exif as $key => $section) {
        foreach ($section as $name => $value) {
          print "<li><input type='checkbox' name='$name' value='1' > $name: $value<br /></li>";
        }
      }
      print "</ol>";
      print "<input type='hidden' name='imgURL' value='$originalOnlineDir'>";
      print "<input type='submit' value='Wipe Metadata'>";
      print "</form>";
    }
    elseif (empty($exif)) {
      #ChromePhp::log("There are no tags in $_FILES['metaful-image']['name']");
      print "<h2>";
      print "There are no metadata tags present in this picture, you're already set!";
      print "</h2>";
    }
    else {
      ChromePhp::log("Unknown error?");
      print "<p>";
      print "Unknown error occured, please try again.";
      print "</p>";
    }
    unlink($_FILES['metaful-image']['name']);
  }

  if(isset($_GET['imgURL']))
  {
      ChromePhp::warn($_GET);
  }
 ?>
