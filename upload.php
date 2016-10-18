<?php
//$blob = $_POST['ino_code'];
//file_put_contents('/tmp', $blob);
move_uploaded_file(
	$_FILES['ino_code']['tmp_name'],
    $_SERVER['DOCUMENT_ROOT'] . "/tmp"
);
?>