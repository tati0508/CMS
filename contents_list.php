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
    <title>CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
  </head>
<body>
  <h1>コンテンツ一覧</h1>

  <table border=1>
    <tr>
      <th>ID</th>
      <th>カテゴリ</th>
      <th>タイトル</th>
      <th>登録日</th>
      <th></th>
    </tr>
  
<?php

  $stmt = $dbh->prepare(
    'select contents.id, contents.title, contents.up_date,' .
    ' categorys.name as category_name from contents' .
    ' join categorys on contents.category_id = categorys.id'
  );
  $stmt->execute();

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
    <tr>
      <td><?= $row['id']?></td>
      <td><?= $row['category_name']?></td>
      <td><?= $row['title']?></td>
      <td><?= $row['up_date']?></td>
      <td>
      <div class='brows'>
        <form action='contents.php' method='post'>
          <button value=<?=$row['id']?> name='content_id'>閲覧</button>
        </form>
      </div>
      <div class='edit'>
        <form action='contents_edit.php' method='post'>
         <button value=<?=$row['id']?> name='content_id'>編集</button>
        </form>
      </div>
    </tr>

<?php
  }
?>
    
    <script type='text/javascript'>

      var brows = document.getElementsByClassName('brows');
      for(let i=0; i<brows.length;i++){
        brows[i].style.visibility = 'hidden';
      }

      var edit = document.getElementsByClassName('edit');
      for(let i=0; i<brows.length; i++){
        edit[i].style.visibility = 'hidden';
      }
    </script>


<?php
    $user_id = $_SESSION['user_id'];
    $ary[] = array();

    $stmt = $dbh->prepare(
      'select * from users_authority where users_id=?'
    );

    $stmt->execute([$user_id]);

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $ary[] = $row['authority_id'];
    }

    foreach($ary as $key){
      if($key == 3){
?>
      <script>
        var brows = document.getElementsByClassName('brows');
        for(let i=0; i<brows.length;i++){
          brows[i].style.visibility = 'visible';
      }
      </script>
<?php
      }
      if($key == 2){
?>
      <script>
        var edit = document.getElementsByClassName('edit');
        for(let i=0; i<brows.length; i++){
          edit[i].style.visibility = 'visible';
      }
      </script>

<?php
      }
    }

?>

  </table>
</body>
</html>