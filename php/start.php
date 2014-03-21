<?php 

// $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
$domain = $_SERVER['HTTP_HOST'];

$time = 2^31 - 1;
// $time = time() + (86400 * 7);

setcookie("minify_percent_errors", "", $time, '/', $domain, false);
setcookie("minify_current_round", "1", $time, '/', $domain, false);
setcookie("minify_unused_files", "example.js,webgl.js", $time, '/', $domain, false);

header("Location: ../play.php");
