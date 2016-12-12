<?php

	define('HOST', '185.69.153.115');
	define('USER', 'roobb');
	define('PASS', 'efO6pHAa');
	define('DB', 'roobb');

	// Соединяемся с базой данных
	$db = @mysqli_connect(HOST, USER, PASS, DB);

	// Проверка того, прошло ли соединение удачно
	if (!$db) {
		die('Ошибка подключения (' . mysqli_connect_errno() . ') '
			. mysqli_connect_error());
	}
	mysqli_set_charset($db, 'utf8') or die('Не установлена кодировка');