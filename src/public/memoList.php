<?php
$pageDepogit = new PageDEpogit();
$memos = $pageDepogit->pagesDepo();
echo json_encode($memos);

class PageDepogit {
  private $pdo; 
  public function __construct() 
  {
    $user = 'root';
    $password = 'password';
    $pdo = new PDO('mysql:host=mysql; dbname=memo; charset=utf8', $user, $password);

  }
  public function pagesDepo (){
    $sql = 'select * from pages';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $memos = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $memos;
  }
}



