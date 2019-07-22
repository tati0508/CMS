<?php
  
  $title = $_POST['title'];

  try {

  $dbh = new PDO(
    'mysql:host=db;dbname=cms',
    'myuser',
    'password'
	);

  $stmt = $dbh->prepare(
    'insert into categorys (name)'.
    'values (?)'
  );

  $stmt->execute([$title]);

  header('Location: category_regi.php');

} catch(PDOException $e) {
  var_dump($e);
}