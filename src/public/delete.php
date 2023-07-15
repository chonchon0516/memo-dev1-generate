<?php
$id = filter_input(INPUT_GET, 'id');
$pagesData = new PageDao();
$pages = $pagesData->deletePage($id);

header('Location: ./index.php');
exit();

  class PageDao 
  { 
    private $pdo; 

    public function __construct() 
    
    {
      $dbUserName = "root";
      $dbPassword = "password";
      $this->pdo = new PDO("mysql:host=mysql; dbname=memo; charset=utf8", $dbUserName, $dbPassword);
    }
    public function deletePage($id): void
    {
      $sql = "DELETE FROM pages where id = $id";
      $statement = $this->pdo->prepare($sql);
      $statement->execute();
      $pagess = $statement->fetchAll(PDO::FETCH_ASSOC); 
    }
  }


?>
