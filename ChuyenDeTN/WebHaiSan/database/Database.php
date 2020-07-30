<?php
	$connect  = mysqli_connect("localhost","root","","webhaisan");
	// Check connection
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
	}
	// Change character set to utf8
	$connect -> set_charset("utf8");
	$connect-> close();
?>