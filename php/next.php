<?php

$time = 2^31 - 1;
$new_round = strval(intval($_COOKIE['minify_current_round']) + 1);

if ($new_round >= 3) {
	header("Location: ../done.php");
} else {

	// do something with % error

	setcookie("minify_current_round", $new_round, $time);
	header("Location: play.php");
}
