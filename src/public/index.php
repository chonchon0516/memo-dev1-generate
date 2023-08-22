<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\PagesData;

 $pagesData = new PagesData();
 $pages = $pagesData->fetchPages(); 

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./main.js" defer></script>
    <link rel="stylesheet" href="./style.css">
</head>
  <body>
     <!-- モーダル要素 -->
     <div class="form_parent">
        <form class="form none_form" action="./store.php" method="post">
            <p><span>タイトル</span></p>
            <p><input class="contents" type="text" name="title"></p>
            <p><span>内容</span></p>
            <p><textarea class="contents content" name="content"></textarea></p>
            <button class="addBlog">送信</button>
            <a href="index.php" class="return">戻る</a>
        </form>
       
    </div>

    <header class="header">
        <ul class="flex_header">
            <li><a href="#" class="new_blog">メモを追加</li>
        </ul>
    </header>

  <div>
    <table border="1">
      <tr>
        <th>タイトル</th>
        <th>内容</th>
        <th>作成日時</th>
        <th>編集</th>
        <th>削除</th>
      </tr>

      <?php foreach ($pages as $page): ?>
        <tr>
          <td><?php echo $page['title']; ?></td>
          <td><?php echo $page['content']; ?></td>
          <td><?php echo $page['created_at']; ?></td>
          <td><a href="./edit.php?id=<?php echo $page['id']; ?>">編集</a></td>
          <td><a href="./delete.php?id=<?php echo $page['id']; ?>">削除</a></td>
        </tr>
      <?php endforeach; ?>

    </table>
  </div>

</body>