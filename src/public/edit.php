<?php
$id = filter_input(INPUT_GET, 'id');
$pagesData = new PagesData();
$page = $pagesData->fetchPages($id);

var_dump($page);
  class PagesData { 
    private $pdo; 

    public function __construct() 
    {
      $dbUserName = "root";
      $dbPassword = "password";
      $this->pdo = new PDO("mysql:host=mysql; dbname=memo; charset=utf8", $dbUserName, $dbPassword);
    }
    public function fetchPages($id): array 
    {
      $sql = "SELECT * FROM pages where id = $id";
      $statement = $this->pdo->prepare($sql);
      $statement->execute();
      $page = $statement->fetchAll(PDO::FETCH_ASSOC); 
      return $page;  
    }
  }





?>

<body>
  
  <h2>編集</h2>

  <form method="post" action="./update.php">

    <input type="hidden" name="id" value=<?php echo $page['id']; ?>>

    <div>
      <label for="name">タイトル
        <input type="text" name="title" value=<?php echo $page["title"]; ?>>
      </label>
    </div>

    <div>
      <label for="name">テーマ
        <input type="text" name="theme" value=<?php print($page['title']); ?>>
      </label>
    </div>

    <div>
      <label for="content">感想
        <input type="textarea" name="content" value=<?php echo $page[
            'content'
        ]; ?>>
      </label>
    </div>

    <button type="submit">更新</button>
    
  </form>

</body>