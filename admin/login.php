<?php


	function login($userName, $userEmail, $remember)
	{
		if (strip_tags(trim($userEmail)) == '' || strip_tags(trim($userName)) == '')
			return false; // авторизация не удалась, имя и почта не должны быть пустыми

		$_SESSION['userName'] = $userName;
		$_SESSION['userEmail'] = $userEmail;
		// var_dump($remember);

		if($remember)
		{
			setcookie('userName', $userName, time() + 3600*24*7, '/');
			setcookie('userEmail', $userEmail, time() + 3600*24*7, '/');
		} else {
			header('Location: index.php');
			exit;
		}

		return true; // авторизация прошла успешно
	}

	function logout() {
		setcookie('userName', '', time() - 3600 );
		setcookie('userEmail', '', time() - 3600 );

		unset($_SESSION['userName']);
		unset($_SESSION['userEmail']);

	}


	// Точка входа нашей программы

	session_start();
	$_SESSION['token'] = md5(uniqid(mt_rand(), true));

	$flag_enter = false;

	logout();

	if(count($_POST) > 0) {
		$flag_enter = login($_POST['userName'], $_POST['userEmail'], $_POST['remember'] == "on");
	}

	if($flag_enter) {
		header('Location: index.php');
		exit;
	}

	?>

<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="mystyle.css">
	<title>Одесские новости</title>
</head>

<body style="background-color:

<?php if(empty($_SESSION['userColor'])):  ?>
	<?= '#FFFFFF' ?>
<?php else: ?>
	<?= $_SESSION['userColor'] ?>
<?php endif; ?>">

<h1>Авторизация на сайте</h1>

<form action="" method="post">
	<div class="form-group">
		<label for="userName">Имя: </label>
		<input type="text" class="form-control"  id="userName" name="userName" placeholder="Введите ваше имя">
		<input type="hidden" name="<?= $_SESSION['token'] ?>">
	</div>
	<div class="form-group">
		<label for="userEmail">E-mail: </label>
		<input type="email" class="form-control"  id="userEmail" name="userEmail" placeholder="Введите ваш email">
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="" name="remember">
			Запомнить меня
		</label>
	</div>
	<input type="submit" value="Войти">
</form>

</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
