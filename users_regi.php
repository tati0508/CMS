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
  <h1>ユーザー登録</h1>
  
  <form action='users_create.php' method='post'>
    <label>ログインID</label>
    <input type='text' name='login_id' placeholder='Enter Login ID'>

    <label>パスワード</label>
    <input type='text' name='password' placeholder='Enter Login Password'>

    <label>ユーザーネーム</label>
    <input type='text' name='user_name' placeholder='Enter user name'><br/>

    <label>権限</label><br/>
<?php
  $stmt = $dbh->prepare('select * from authority');
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
        <input type='checkbox' name="authority[]" value=<?=$row['id']?>><?=$row['name']?><br/>
<?php
  }
?>
    <button>登録</button>
  </form>
</body>
</html>