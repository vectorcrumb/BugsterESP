<?php
define("UPLOAD_DIR", "/tmp/bugdata/");
$myfile = fopen("/tmp/marker.txt", "w");

if (!empty($_FILES["inoCode"])) {
	$inoCode = $_FILES["inoCode"];

	// Check for no errors
	if ($inoCode["error"] !== UPLOAD_ERR_OK) {
		echo "<p>An error ocurred.</p>";
		exit;
	}
	// Ensure safe filename
	// $name = preg_replace("/[^A-Z0-9._-]/i", "_", inoCode["name"]);
	// Don't overwrite existing file
	$i = 0;
	$parts = pathinfo($name);
	while (file_exists(UPLOAD_DIR . $name)) {
		$i++;
		$name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
	}
	// Save uploaded file from temporary directory
	$success = move_uploaded_file($inoCode["tmp_name"], UPLOAD_DIR . $name);
	if(!$success) {
		echo "<p>Unable to save file.";
		exit;
	}
	// Set proper permissions on new file
	chmod(UPLOAD_DIR . $name, 0644);
}
?>