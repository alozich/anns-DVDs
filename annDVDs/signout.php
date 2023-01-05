<?php
	session_start();
	session_destroy();
	header('Location: https://compsci04.snc.edu/~loziac/csci322/annDVDs/index.php');
	exit;
?>