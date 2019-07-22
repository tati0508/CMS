<?php
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
  <script src="main.js"></script>
</head>
<body>
	<div class='loginWrap'>
		<h2>ログイン</h2>
		<form action='login.php' method='post'>
				<lavel>ログインID</lavel><input type='text' name='login_id'><br />
				<lavel>パスワード</lavel><input type="text" name='password'>
				<input type='submit' value='ログイン'>
		</form>
		<a href='create_account.php'>新規登録はこちら</a>
	</div>
  
</body>
</html>