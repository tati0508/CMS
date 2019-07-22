<?php
  
  $authority = $_POST['authority'];

  try {

  $dbh = new PDO(
    'mysql:host=db;dbname=cms',
    'myuser',
    'password'
	);

  $stmt = $dbh->prepare(
    'insert into authority (name)'.
    'values (?)'
  );

  $stmt->execute([$authority]);

  header('Location: users_authority.php');

} catch(PDOException $e) {
  var_dump($e);
}