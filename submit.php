<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ受け取り</title>
</head>
<body>
    <?php
    // index.phpで入力したデータを受け取る
    $memo = filter_input(INPUT_POST,'to_do', FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($memo)){
        die($memo->error);
        echo '入力しておりせんので再度ご入力をお願いいたします';
    }
    // SQLに接続する
    $db = new mysqli('localhost:8889' , 'root', 'root' , 'app');

    //SQLステートメントを準備する。valueの「？」はのちに内容を設定する。
    //プレースホルダーを有するため、queryではなくprepareを使用する。
    $stmt =$db->prepare('insert into to_do_list(text) values(?)');

    //SQLに挿入できているか確認
    if (!$stmt):
        die($db->error);
    endif;
    // 「？」の内容を設定する。「？」はindex.phpで送信された$memoの内容
    $stmt->bind_param('s', $memo);

    // 下記記載により初めてSQLに接続できる。
    $ret = $stmt->execute();

    //実行できているか確認
    if($ret):
        echo '登録できました';
    else:
        $db->error;
    endif;
    ?><br>
    <a href="index.php">戻る</a>


</body>
</html>