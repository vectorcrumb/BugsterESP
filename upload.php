<?php
define("UPLOAD_DIR", "/tmp/bugdata");

if (!empty($_FILES["inoCode"])) {
	$inoCode = $_FILES["inoCode"];

	// Check for no errors
	if ($inoCode["error"] !== UPLOAD_ERR_OK) {
		echo "<p>An error ocurred.</p>";
		exit;
	}
	// Obtain filename
	$name = $inoCode["name"];
	// echo UPLOAD_DIR . $name;
	// Don't overwrite existing file
	$i = 0;
	$parts = pathinfo($name);
	while (file_exists(UPLOAD_DIR . $name)) {
		$i++;
		$name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
	}
	// Save uploaded file from temporary directory
	$success = move_uploaded_file($inoCode["tmp_name"], UPLOAD_DIR . "/" . $name);
	if(!$success) {
		echo "<p>Unable to save file.</p>";
		exit;
	}
	// Set proper permissions on new file
	// chmod(UPLOAD_DIR . $name, 0644);
}
?>
