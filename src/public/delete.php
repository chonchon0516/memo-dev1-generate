<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\PagesData;

$id = filter_input(INPUT_GET, 'id');
$pagesData = new PagesData();
$pages = $pagesData->deletePage($id);

header('Location: ./index.php');
exit();


?>
