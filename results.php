<?php 

print_r($_COOKIE['minify_percent_errors']);

$perror = reset(explode(",", $_COOKIE['minify_percent_errors']));

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Minify That File</title>
</head>
<body>
	
	<p><?= $perror ?></p>

	<form action="play.php">
		<button type="submit">Next Round</button>
	</form>
</body>
</html>