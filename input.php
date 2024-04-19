<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
        
        <script>
        function fmconfirm(){
        if(window.confirm('投稿しますか？')){
        return true; 
        } else {
            window.alert("投稿をキャンセルしました。");
            return false;
        }
        }   
        </script>
		
	</head>
	<body>
    <h1>ニューーーーーす</h1>
        <form id="frmInput" name="frmInput" method="post" action="" onsubmit="return fmconfirm()">

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
        $title = $_POST['title_name'];
        $message = $_POST['message_name'];

        //id取得
        while(have_posts()):the_post();
        $post_id = get_the_ID();
        endwhile;

        //条件をチェックする
        if(empty($_POST['title_name']) and empty($_POST['message_name'])){
            echo $alert = "<script type='text/javascript'>alert('タイトルと内容を記入してください。');</script>";

        }elseif(empty($_POST['title_name'])){
            echo $alert = "<script type='text/javascript'>alert('タイトルを記入してください。');</script>";

        }elseif(empty($_POST['message_name'])){
            echo $alert = "<script type='text/javascript'>alert('内容を記入してください。');</script>";

        }elseif(strlen($_POST['title_name']) > 30){
            echo $alert = "<script type='text/javascript'>alert('タイトルは30文字以下で記入してください');</script>";
           
        }else{
               
        // //条件を全て満たしたらファイルに書き込む
        // $filename = "data.txt";
        // $fp = fopen('data.txt', 'a');
        // fwrite($fp, $write_title.PHP_EOL);
        // fwrite($fp, $write_message.PHP_EOL);
        // fclose($fp);

        //id取得
        // while(have_posts()):the_post();
        // $post_id = get_the_ID();
        // endwhile;

        global $wp_query;
$post_id = $wp_query->get_queried_object_id();

        //　ファイルを開く
        $filename = "matome/matome.txt";
        $fp = fopen($filename, "a");

        // ファイルに記入
        $data = $title  . "\t" . $message;
        fwrite($fp, $data.PHP_EOL);

        // ファイルを閉じる
        fclose($fp);


        // POST処理の最後にリダイレクト処理
        header("Location:http://localhost:8888/input.php");
        exit();  
        }
    }

        //ファイルを開いて表示 
        $filename = "matome/matome.txt"; 
        $file = fopen($filename, "r");
        while (!feof($file)) {
        $str = fgets($file);
        
        if(!empty($str)){
            print "$str<BR>";
            print '<a href="syousai.php">'."記事全文・コメントを読む<BR><BR>".'</a><br />';
        }
       }
        fclose($file);  
        
?>
        
	</body>
</html>