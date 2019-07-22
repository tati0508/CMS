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

<?php
  if($_SESSION['user_id'] == null){
?>
  <div class="contentsWrap">
    <div class='loginWrap'>
      <h2>ログイン</h2>
      <form action='login.php' method='post'>
          <lavel>ログインID</lavel><input type='text' name='login_id'><br />
          <lavel>パスワード</lavel><input type="password" name='password'>
          <input type='submit' value='ログイン'>
      </form>
    </div>

<?php
  } else {
?>

  <header>
    <h2>CMS</h2>
    <a href='logout.php'>ログアウト</a>
  </header>

    <ul class='menu'>
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
      if($key == 1){

?>
      <button class="toggleButton">＋</button>
      <li class="toggleMenu">ユーザー管理
        <ul id='user_regi'>
          <li onclick='iframe_change("users_regi.php")'>ユーザー登録</li>
          <li onclick='iframe_change("users_authority.php")'>権限登録</li>
        </ul>
      </li>
<?php
      }
    }

?>
      <button class="toggleButton">＋</button>
      <li>コンテンツ管理
        <ul id='contents_regi'>
          <li onclick='iframe_change("content_regi.php")'>コンテンツ登録</li>
        </ul>
      </li>
      <button class='toggleButton'>＋</button>
      <li>カテゴリ管理
        <ul id='category_regi'>
          <li onclick='iframe_change("category_regi.php")'>カテゴリ登録</li>
        </ul>
      </li>
      <li onclick='iframe_change("contents_list.php")'>コンテンツ一覧</li>
    </ul>

    <iframe id='iframe_id' src="contents_list.php" width="720" height="500"></iframe>
  </div>

  <script type="text/javascript">

    function iframe_change(url) {
      var iframe = document.getElementById('iframe_id');
      iframe.contentWindow.location.replace(url);
    }
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.toggleButton').on('click', function(){
        $(this).next('li').children('ul').slideToggle();
      });
    });

  </script>
<?php

  }
?>
</body>
</html>