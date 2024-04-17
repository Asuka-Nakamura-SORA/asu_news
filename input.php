

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<h1>news</h1>
	</head>
	<body>


        <form id="frmInput" name="frmInput" method="post" action="">

            <p><label for="title_name">タイトル</label></p>
            <input type="text" name="title_name" id="title_name">

            <p><label for="message_name">内容</label></p>
            <input type="text" name="message_name" id="message_name">

            <p><input type="submit" value="投稿"></p>

        </form>

        
        <h1>一覧</h1>
        

        <?php
            date_default_timezone_set('Asia/Tokyo');
           
               
                    if(isset($_POST['title_name'], $_POST['message_name'])) {

                      
    
                    //post取得
                    $fp = fopen("data/" . date("Ymd") . ".txt", "a");
                    $fp_matome = fopen("matome/matome.txt", "a");
                    $write_str = $_POST['title_name'] . "\t" . $_POST['message_name'] . "\n";

                    // 空かどうかをチェックする
                    if (!empty($_POST['title_name'].$_POST['message_name'])) {

                        
                    //空じゃなかったらファイルに書き込む
                    fwrite($fp, $write_str);
                    fwrite($fp_matome, $write_str);
                    fclose($fp);

                    // POST処理の最後にリダイレクト処理
                    header("Location:http://localhost:8888/input.php");
                    exit();  }
                    }

                    

                    //ファイルを開いて表示
                        $fileName = "matome/matome.txt";    
                        $file = fopen($fileName, "r");
        
                        while (!feof($file)) {
                    
                        
                        $str = fgets($file);
                        print "$str<BR>";
                    }
                        fclose($file);         

        ?>
        

	</body>
  

</html>