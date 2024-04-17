<?php
date_default_timezone_set('Asia/Tokyo');

if(isset($_POST['title_name'], $_POST['message_name'])) {
	$fp = fopen("data/" . date("Ymd") . ".txt", "a");
	$fp_matome = fopen("matome/matome.txt", "a");
	$write_str = $_POST['title_name'] . "\t" . $_POST['message_name'] . "\n";
	fwrite($fp, $write_str);
	fwrite($fp_matome, $write_str);
	fclose($fp);
}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>完了ページ</title>
	</head>
	<body>

	<p>投稿しました</p>

	</body>
</html>