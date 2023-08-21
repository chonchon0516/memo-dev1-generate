<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\PagesData;




$id = filter_input(INPUT_POST, 'id');
$title = filter_input(INPUT_POST, 'title');
$content = filter_input(INPUT_POST, 'content');

if (!empty($title) && !empty($content)) {
    $pageDateUpdate = new PagesData();
    $pageDateUpdate->updatePage($id,$title,$content);

    header('Location: ./index.php');
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
