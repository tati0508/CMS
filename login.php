<?php

  $login_id = $_POST['login_id'];
  $password = $_POST['password'];

  $dbh = new PDO(
    'mysql:host=db;dbname=cms',
    'myuser',
    'password'
	);
  session_start();
  
  $stmt = $dbh->prepare(
    'select * from users'
  );

  $stmt->execute();

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    if($row['login_id'] == $login_id){
      if($row['password'] == $password){
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        header('Location: index.php');
      } else {
        echo 'パスワードが間違っています';
        echo '<a href="index.php">topへ戻る</a>';
        exit;
      }
    }
  }

  echo 'ログインIDが間違っています';
  echo '<a href="index.php">topへ戻る</a>';