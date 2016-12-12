<?php
	session_start();

	include_once '../verify.php';

	if (isset($_POST['color']))
	{
		$_SESSION['userColor'] = $_POST['color'];
		setcookie('userColor', $_SESSION['userColor'], time() + 60 * 60 * 24 * 7 * 2);
		header('Location: ../index.php');
		exit;
	}

	$bg_colors = ['Lavender - #EBDDE2' => '#EBDDE2', 'Cyan - #E0FFFF' => '#E0FFFF', 'Green - #99C68E' => '#99C68E', 'Pink - #FAAFBA' => '#FAAFBA'];

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Одесские новости</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1>Личный кабинет</h1>
	<form action="" method="post">
		<div class="form-group">
			<label for="color">Выбор цвета:</label>
			<select class="form-control" name="color" id="color">
				<?php foreach ($bg_colors as $key => $bg_color) : ?>
					<?php if ($_SESSION['userColor'] == $bg_color) : ?>
						<?= '<option selected value="' . $bg_color . '">' . $key . ' </option>' ?>
					<?php else : ?>
						<?= '<option value="' . $bg_color . '">' . $key . ' </option>' ?>
					<?php endif ?>
				<?php endforeach; ?>
			</select>
			<input type="submit" value="Изменить фон">
		</div>
	</form>
	<div id="site_link"><p><a href="../index.php">Вернуться на сайт</a></p></div>
</div>


</body>
</html>
