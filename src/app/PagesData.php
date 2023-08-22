<?php
namespace App;
use PDO;
class PagesData { 
    private $pdo; 

    public function __construct() 
    {
      $dbUserName = "root";
      $dbPassword = "password";
      $this->pdo = new PDO("mysql:host=mysql; dbname=memo; charset=utf8", $dbUserName, $dbPassword);
    }
    public function fetchPages(): array 
    {
      $sql = "SELECT id, content, title, DATE_FORMAT(created_at, '%Y年%m月%d日%H時%i分%s秒') AS created_at FROM pages ORDER BY created_at DESC";
      $statement = $this->pdo->prepare($sql);
      $statement->execute();
      $pages = $statement->fetchAll(PDO::FETCH_ASSOC); 
      return $pages;  
    }
    public function findPageById($id): array 
    {
      $sql = "SELECT * FROM pages where id = $id";
      $statement = $this->pdo->prepare($sql);
      $statement->execute();
      $page = $statement->fetch(PDO::FETCH_ASSOC); 
      return $page;  
    }
     public function deletePage($id): void
    {
      $sql = "DELETE FROM pages where id = $id";
      $statement = $this->pdo->prepare($sql);
      $statement->execute();
      $pagess = $statement->fetchAll(PDO::FETCH_ASSOC); 
    }
     public function createPage ($title, $content):void
    {
      $sql = 'INSERT INTO `pages`(`title`, `content`) VALUES(:title, :content)';
      $statement = $this->pdo->prepare($sql);
      $statement->bindValue(':title', $title, PDO::PARAM_STR);
      $statement->bindValue(':content', $content, PDO::PARAM_STR);
      $statement->execute();

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