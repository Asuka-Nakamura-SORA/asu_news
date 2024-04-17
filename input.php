<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<h1>news</h1>
	</head>
	<body>

        <form id="frmInput" name="frmInput" method="post" action="input_do.php">

            <p><label for="title_name">タイトル</label></p>
            <input type="text" name="title_name" id="title_name">

            <p><label for="message_name">内容</label></p>
            <input type="text" name="message_name" id="message_name">

            <p><input type="submit" value="投稿"></p>

        </form>

        
        <h1>一覧</h1>
        
        
        <?php
        // ファイル名を指定
        $filename = 'matome/matome.txt';

        // ファイルの内容を読み込む
        $content = file_get_contents($filename);


        // 内容をHTMLの段落として表示する
        echo '<p>' . $content . '</p>';
        ?>

	</body>
</html>