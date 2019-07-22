<?php
  
  $category_id = $_POST['category_id'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $content_id = $_POST['content_id'];

  date_default_timezone_set('Asia/Tokyo');
  $up_date = date('Y.m.d H:i:s');

  try {

  $dbh = new PDO(
    'mysql:host=db;dbname=cms',
    'myuser',
    'password'
  );
  
  if($content_id != null){

    $stmt = $dbh->prepare(
      'update contents set content=?,'.
      ' title=?, category_id=? where id=?');
    $stmt->execute([$content, $title, $category_id, $content_id]);

    header('Location: contents_list.php');
    
  } else {

    $stmt = $dbh->prepare(
      'insert into contents (title, up_date, content, category_id)'.
      'values (?, ?, ?, ?)'
    );
    $stmt->execute([$title, $up_date, $content, $category_id]);

    header('Location: content_regi.php');
  }

} catch(PDOException $e) {
  var_dump($e);
}