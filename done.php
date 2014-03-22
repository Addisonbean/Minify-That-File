<?php 

$perror = explode(",", $_POST['perror_list']);
$perror_list = array_map("strval", $perror);
$total_perror = round(array_sum($perror_list) / count($perror_list));

include 'php/layout.php';

?>
		<div id="stats">
			<h2>Your total score:</h2>
			<p><?= $total_perror ?></p>
		</div>
	</div>
<script src="js/prism.js"></script>
</body>
</html>
