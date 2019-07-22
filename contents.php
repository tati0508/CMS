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
  <h1>内容</h1>

  
<?php

  $content_id = $_POST['content_id'];

  $stmt = $dbh->prepare(
    'select contents.content from contents where id=?'
  );
  $stmt->execute([$content_id]);

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
    <p><?=$row['content']?></p>
<?php
  }
  
?>
  </table>
</body>
</html>