<?php 

$perror_list = $_POST['perror_list'];
$round = $_POST['round'];
$unused_files = explode(",", $_POST['unused_files']);
shuffle($unused_files);

$old_path = "code";
$new_path = "$old_path/compressed";
$file_name = array_pop($unused_files);

$new_files = implode(",", $unused_files);

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

include 'php/layout.php';

?>
		<ul>
			<li><span class="bytes"><?= $old_bytes ?> bytes</span></li>
			<pre class="line-numbers"><code class="language-<?= $language ?>"><?= $old_file ?></code></pre>
		</ul>
		<form action="results.php" method="post">
			<label for="bytes">Bytes after minification: </label>
			<input type="number" name="guess">
			<p>bytes</p>
			<br>
			<button type="submit">Submit</button>
			<input type="hidden" name="perror_list" value="<?= $perror_list ?>">
			<input type="hidden" name="unused_files" value="<?= $new_files ?>">
			<input type="hidden" name="used_file" value="<?= $file_name ?>">
			<input type="hidden" name="round" value="<?= $round ?>">
		</form>
	</div>
<script src="js/prism.js"></script>
</body>
</html>