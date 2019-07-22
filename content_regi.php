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
  <h1>コンテンツ登録</h1>
  
  <form action='content_create.php' method='post'>
    <label>カテゴリ</label>
    <select name='category_id'>
<?php
  $stmt = $dbh->prepare('select * from categorys');
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
        <option value=<?=$row['id']?>><?=$row['name']?></option>
<?php
  }
?>
    </select>
    <label>タイトル</label>
    <input type='text' name='title'>
    
    <label>内容</label>
    <input type='text' name='content'>
    <button>登録</button>
  </form>
</body>
</html>