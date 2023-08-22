<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\PagesData;



$content = filter_input(INPUT_POST, 'content');
$title = filter_input(INPUT_POST, 'title');



// [解説！]ガード節になっている
if (!empty($title) && !empty($content)) {
  $pageCollect = new PagesData();
  $pageCollect->createPage($title,$content);
  // [解説！]リダイレクト処理
  header('Location: ./index.php');
  // [解説！]リダイレクトしても処理が一番下まで続いてしまうので「exit」しておこう！！！
   exit();
}
$error = 'タイトルまたは本文が入力されていません';
?>

<body>
  <div>
    <p><?php echo $error . "\n"; ?></p>
    <a href="./index.php">
        <p>トップページへ</p>
    </a>
  </div>
</body>