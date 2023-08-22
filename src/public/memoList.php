<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\PagesData;

$pageDepogit = new PagesData();
$pages = $pageDepogit->fetchPages();
echo json_encode($pages);





