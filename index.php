<?php 
//htmlspecialcharsを短縮系にしたい。
function h($value){
   return htmlspecialchars($value);
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>TO DO List</title>
</head>
<body>
    <header>
        <div class="title-first">
            <h1>TO DO LIST</h1>
            <div class="title-right">
            <p>目標達成のために努力を継続しよう！</p>
            </div> 
        </div>

        <div class="title-second">        
        <form action="submit.php" method="post">
            <textarea name="to_do" cols="60" rows="5" placeholder="メモを入力してください。"></textarea><br>
            <button type="submit">編集する</button> 
        </form>
    </header>

    <main>
        <!-- ①表作成 -->
    <table border="1" width="700" class="information" >
        <tr>
            <!-- ②一列目：項目名記載 -->
            <th>ID</th>
            <th>実施項目</th>
            <th>削除</th>
        </tr>
                <?php
                $db = new mysqli('localhost:8889' , 'root', 'root' , 'app');
                $records = $db->query('select * from to_do_list');?>
                <?php if($records):?>
                    <?php while ($record = $records->fetch_assoc()):?>
                    <tr>
                        <th><?php echo h($record['id']); ?></th>
                        <th><?php echo h($record['text']); ?></th>
                        <th><a href="delete.php?id=<?php echo $record['id']; ?>">削除する</a></th>
                    <tr>
                <?php endwhile;?>
                <?php endif; ?>


    </main>
    </table>

</body>
</html>