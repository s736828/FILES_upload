<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=upload";
$pdo=new PDO($dsn,'root','');

$sql="delete from `images` where `id`={$_GET['id']}";

//↓從img資料夾刪除 
$img=$pdo->query("select `img` from `images` where `id`='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
unlink("../img/".$img['img']);

// ↓從資料庫刪除
$pdo->exec($sql);

header("location:../upload.php");