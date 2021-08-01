<!--
    Programmed By: DJ Booker
    June 22, 2021
    This program will demonstrate how to upload files
-->

<title> Activity-06-22-2 </title>

<html>

<body>
	<!--IMPORTANT FORM TAGS-->
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
		<h1>Please provide the following documents:</h1>
		Select an image to upload:<input type="file" name="myimage"><br />
		Select a PDF file to upload: <input type="file" name="mypdf"><br />
		<br />
		<input type="submit" name="submit" value="submit"><br />
	</form>
	<?php
	function UploadFile($tagName, $fileAllowed, $sizeAllowed, $overwriteAllowed)
	{
		$uploadOK = 1; // Upload is ok
		$dir = "upload/"; // Specify directory

		$file = $dir . basename($_FILES[$tagName]["name"]); // customer local folder name
		$fileType = pathinfo($file, PATHINFO_EXTENSION);
		$fileSize = $_FILES[$tagName]["size"];

		if ($fileSize > $sizeAllowed) {
			$uploadOK = 0;
			echo "File is too large<br/>";
		}
		if (!stristr($fileAllowed, $fileType)) {
			$uploadOK = 0;
			echo "File type is not allowed<br/>";
		}
		if (!$overwriteAllowed && file_exists($file)) {
			$uploadOK = 0;
			echo "File already exists<br/>";
		}
		if ($uploadOK == 1) {
			if (!move_uploaded_file($_FILES[$tagName]["tmp_name"], $file)) {
				$uploadOK = 0;
			}
		}
		if ($uploadOK == 1) {
			return $file;
		} else {
			return false;
		}
	}
	?>

	<hr />

	<?php
	// Pressing submit
	if (isset($_POST["submit"])) {
		$tagName = "myimage";
		$fileAllowed = "PNG:JPEG:JPG:GIF:BMP";
		$sizeAllowed = 5000000;
		$overwriteAllowed = 1;

		$file = UploadFile($tagName, $fileAllowed, $sizeAllowed, $overwriteAllowed);
		if ($file != false) {
			echo "<image src='" . $file . "' width=200 height=200>";
		} else {
			echo "Submission of the image failed<br/>";
		}
		
		// PDF File
		echo "<hr/>";
		echo "The upload PDF file is: <br/>";
		$tagName = "mypdf";
		$fileAllowed = "PDF";
		$sizeAllowed = 60000000;
		$overwriteAllowed = 1;

		$file = UploadFile($tagName, $fileAllowed, $sizeAllowed, $overwriteAllowed);
		if ($file != false) {
			// Use Link
			echo "Click <a href='".$file."'>here</a> to see my CV.<br/>";

			// Use iframe, Not the best choice because it will not be supported by most browsers
			echo "<iframe height=500 width=500 src='".$file."'></iframe>";

			// Using embed
			echo "<embed type='application/pdf' src='".$file."' width=500 height=500>";
		} else {
			echo "Submission of the image failed<br/>";
		}
	}
	?>
</body>

</html>