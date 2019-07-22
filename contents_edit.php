<?php
  $dbh = new PDO(
    'mysql:host=db;dbname=cms',
    'myuser',
    'password'
	);
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
  <h1>編集</h1>

  
<?php

  $content_id = $_POST['content_id'];

  $stmt = $dbh->prepare(
    'select contents.content, contents.title' .
    ' from contents where id=?'
  );
  $stmt->execute([$content_id]);

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $title = $row['title'];
    $content = $row['content'];
  }
?>
  <form action='content_create.php' method='post'>
    <input type='hidden' name='content_id' value=<?=$content_id?>>

    <label>カテゴリ</label>
    <select name='category_id'>
<?php
  $_stmt = $dbh->prepare('select * from categorys');
  $_stmt->execute();
  while($_row = $_stmt->fetch(PDO::FETCH_ASSOC)){
?>
        <option value=<?=$_row['id']?>><?=$_row['name']?></option>
<?php
  }
?>
    </select>
    <label>タイトル</label>
    <input type='text' name='title' value=<?=$title?>>
    
    <label>内容</label>
    <input type='text' name='content' value=<?=$content?>>
    <button>登録</button>
  </form>

<?php
  
?>
  </table>
</body>
</html>