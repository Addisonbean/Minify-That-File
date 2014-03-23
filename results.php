<?php 

$round = intval($_POST['round']);
$file_name = $_POST['used_file'];
$guess = $_POST['guess'];

$old_list = $_POST['perror_list'];

$answer = filesize("code/compressed/" . $_POST['used_file']);
$perror = strval(abs(round(($guess - $answer) / $answer * 100)));

$perror_list = implode(",", array($perror, $old_list));

$unused_files = $_POST['unused_files'];
$unused_files_count = explode(",", $unused_files);
if ($round >= 5) {
	$action = "done";
	$btn_text = "Finish";
} else {
	$round += 1;
	$action = "play";
	$btn_text = "Next Round";
}

include 'php/layout.php';

?>
		
		<div id="perror">
			<h2>Your percent error:</h2>
			<p><?= $perror ?>%</p>
			<form action="<?= $action ?>.php" method="post">
				<input type="hidden" name="perror_list" value="<?= $perror_list ?>">
				<input type="hidden" name="unused_files" value="<?= $unused_files ?>">
				<input type="hidden" name="used_file" value="<?= $file_name ?>">
				<input type="hidden" name="round" value="<?= $round ?>">
				<button class="btn" type="submit"><?= $btn_text ?></button>
			</form>
		</div>

		
	</div>
</body>
</html>