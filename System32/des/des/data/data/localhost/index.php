<?php
	session_start();
	unset($_SESSION['auth']);
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="images/logo.ico">
	<link rel="stylesheet" type="text/css" href="styles/auth.css">
	<title>ЗАО "Русская косметика"</title>
</head>
<body>
	<main class="main-body">
		<div class = "form">
			<form class="form" method="post" action="admin.php">
				<img src="images/logo.png">
				<div class="form-item">
					<label for="login">Введите логин</label>
				</div>
				<div class="form-item">
					<input class="input" name="login" placeholder="Введите логин" type="text" autocomplete="off" id = "login">
				</div>
				<div class="form-item">
					<label for="password">Введите пароль</label>
				</div>
				<div class="form-item">
					<input class="input" name="password" placeholder="Введите пароль" type="text" autocomplete="off" id = "password">
				</div>
				<div class="form-item">
					<input id="submit" type="submit" value="Войти">
				</div>
			</form>
		</div>
	</main>
</body>
<script type="text/javascript" src="scripts/auth.js"></script>
</html>
