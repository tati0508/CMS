<?php
  $dbh = new PDO(
    'mysql:host=db;dbname=cms',
    'myuser',
    'password'
	);
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</head>
<body>
  <h1>カテゴリ登録</h1>
  
  <form action='category_create.php' method='post'>
    <label>カテゴリタイトル</label>
    <input type='text' name='title'>
    <button>登録</button>
  
</body>
</html>