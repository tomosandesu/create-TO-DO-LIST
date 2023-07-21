<?php
$db = new mysqli("localhost:8889", "root", "root", "app");
$stmt = $db->prepare('delete from to_do_list where id=?');

if(!$stmt){
    die($db->error);
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!$id){
    echo 'メモが正しく指定されていません';
    exit();
}

$stmt->bind_param('i', $id);
$success = $stmt->execute();
if(!$success) {
    die($db->error);
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>削除ページ</title>
</head>
<body>
    
</body>
</html>
<a href="index.php">戻る</a>