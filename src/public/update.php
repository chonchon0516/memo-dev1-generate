<?php
class PageDateUpdate 
{
  private $pdo; 
    public function __construct() 
    {
      $dbUserName = 'root';
      $dbPassword = 'password';
      $this->pdo = new PDO(
      'mysql:host=mysql; dbname=memo; charset=utf8',
      $dbUserName,
      $dbPassword
      );
    }
    public function updatePage ($id, $title, $content) {
      $sql = 'UPDATE pages SET title=:title, content=:content WHERE id = :id';
      $statement = $this->pdo->prepare($sql);
      $statement->bindValue(':id', $id, PDO::PARAM_INT);
      $statement->bindValue(':title', $title, PDO::PARAM_STR);
      $statement->bindValue(':content', $content, PDO::PARAM_STR);
      $statement->execute(); 
    }
}


$id = filter_input(INPUT_POST, 'id');
$title = filter_input(INPUT_POST, 'title');
$content = filter_input(INPUT_POST, 'content');

if (!empty($title) && !empty($content)) {
    $pageDateUpdate = new PageDateUpdate();
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
