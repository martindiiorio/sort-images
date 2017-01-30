<?php

$listOfItems = [1, 2, 3, 4];
$counter = 0;
foreach ($_POST as $key => $value) {
	$thisSubmit = substr($key, 6);
}
if (isset($_POST['submit'.$thisSubmit]))
{
	$filename = $_FILES["file"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	$filesize = $_FILES["file"]["size"];
	$allowed_file_types = array('.jpg','.gif','.png'); // validation server extension

	if (in_array($file_ext,$allowed_file_types) && ($filesize < 1000000))
	{
		// Rename file
		$newfilename = md5($file_basename) . $file_ext;
		if (file_exists("img/" . $newfilename))
		{
			// file already exists error
			echo "You have already uploaded this file.";
		}
		elseif ($file_ext)
		{
      mkdir("img/" . $thisSubmit, 0777, true);
			move_uploaded_file($_FILES["file"]["tmp_name"], "img/" . $thisSubmit . "/" . $thisSubmit . $file_ext);
			// echo "File uploaded successfully.";
		}
	}
	elseif (empty($file_basename))
	{
		// file selection error
		echo "Please select a file to upload.";
	}
	elseif ($filesize > 1000000)
	{
		// file size error
		echo "The file you are trying to upload is too large.";
	}
	else
	{
		// file type error
		echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
		unlink($_FILES["file"]["tmp_name"]);
	}
}
?>
