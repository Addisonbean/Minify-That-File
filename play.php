<?php 

$unused_files = explode(",", $_COOKIE['minify_unused_files']);

$old_path = "code";
$new_path = "$old_path/compressed";
// $file_name = array_rand($unused_files);
$file_name = "example.js";

$old_file = file_get_contents("$old_path/$file_name");
$new_file = file_get_contents("$new_path/$file_name");

$old_bytes = filesize("$old_path/$file_name");
$new_bytes = filesize("$new_path/$file_name");

$ext = pathinfo($file_name, PATHINFO_EXTENSION);
$language = "";

switch ($ext) {
	case 'php':
		$language = "php";
		break;
	case 'js':
		$language = "javascript";
		break;
	case 'htm':
	case 'html':
		$language = "html";
		break;
	case 'css':
		$language = "css";
		break;
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Minify That File</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/prism.css">
</head>
<body>

	<div id="container">
		<ul>
			<li><span class="bytes"><?= $old_bytes ?> bytes</span></li>
			<pre class="line-numbers"><code class="language-<?= $language ?>"><?= $old_file ?></code></pre>
		</ul>
	</div>
<script src="js/prism.js"></script>
</body>
</html>