<?php

$time = 2^31 - 1;
$new_round = strval(intval($_COOKIE['minify_current_round']) + 1);

if ($new_round >= 3 || !$_POST['unused_files']) {
	header("Location: ../done.php");
} else {
	$domain = $_SERVER['HTTP_HOST'];
	$unused_files = $_POST['unused_files'];
	$file_name = $_POST['used_file'];
	$guess = intval($_POST['guess']);
	$answer = filesize("../code/compressed/$file_name");
	$perror = strval(abs(round(($guess - $answer) / $answer * 100, 2)));

	$new_errors = $perror . "," . $_COOKIE['minify_percent_errors'];

	setcookie("minify_percent_errors", $new_errors, $time, '/', $domain, false);
	setcookie("minify_unused_files", $unused_files, $time, '/', $domain, false);
	setcookie("minify_current_round", $new_round, $time);
	header("Location: ../results.php");
}
