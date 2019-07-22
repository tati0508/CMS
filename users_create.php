<?php
  
  $login_id = $_POST['login_id'];
  $password = $_POST['password'];
  $user_name = $_POST['user_name'];
  $authority = $_POST['authority'];
  $user_id;

  try {

  $dbh = new PDO(
    'mysql:host=db;dbname=cms',
    'myuser',
    'password'
	);

  $stmt = $dbh->prepare(
    'insert into users (name, login_id, password)'.
    'values (?, ?, ?)'
  );

  $stmt->execute([$user_name, $login_id, $password]);

  $stmt = $dbh->prepare(
    'select * from users where login_id=?'
  );

  $stmt->execute([$login_id]);

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $user_id = $row['id'];
  }

  for($i=0; $i<count($authority); $i++) {
    $_stmt = $dbh->prepare('insert into users_authority(users_id, authority_id) values (?, ?)'
    );

    $_stmt->execute([$user_id, $authority[$i]]);
  }

  header('Location: users_regi.php');

} catch(PDOException $e) {
  var_dump($e);
}