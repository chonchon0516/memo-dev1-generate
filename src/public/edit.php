<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\PagesData;

$id = filter_input(INPUT_GET, 'id');
$pagesData = new PagesData();
$page = $pagesData->findPageById($id);

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
      <label for="content">感想
        <input type="textarea" name="content" value=<?php echo $page[
            'content'
        ]; ?>>
      </label>
    </div>

    <button type="submit">更新</button>
    
  </form>

</body>