<?php

$old_path = "code";
$file_name = "example.js";

$old_file = file_get_contents("$old_path/$file_name");
$old_bytes = filesize("$old_path/$file_name");

$file_list = scandir("code/compressed");
$file_list = array_splice($file_list, 2);

$all_files = implode(",", $file_list);

include 'php/layout.php';

?>
		<div id="tutorial">
			<h2>How to play:</h2>
			<ul>
				<li>You will be given some code and the amount of bytes it is, like the following: </li>
				<span class="bytes"><?= $old_bytes ?> bytes</span>
				<li><pre class="line-numbers"><code class="language-javascript"><?= $old_file ?></code></pre></li>
				<li>You will have to guess the amount of bytes the file is after it is minified.</li>
				<li>After each file you guess, you will get a percent error.</li>
				<li>At the end of the game, your average percent error from all 5 rounds will be your score. (So a lower score is better!)</li>
			</ul>
			<form action="play.php" method="post">
				<input type="hidden" name="unused_files" value="<?= $all_files ?>">
				<input type="hidden" name="perror_list" value="">
				<input type="hidden" name="round" value="1">
				<button class="btn" type="submit">Start playing!</button>
			</form>
		</div>

	</div>
<script src="js/prism.js"></script>
</body>
</html>