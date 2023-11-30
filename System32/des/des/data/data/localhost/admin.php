<?php
session_start();
if ($_SESSION["auth"] != 1 && !isset($_SESSION["auth"])) {
	if(!isset($_POST["login"]) && !isset($_POST["password"])){
		header("Location: http://site12.ru/index.php");
		exit();
	}else{
		$correctLogin = "admin";
		$correctPassword = "admin";

		$enteredLogin = $_POST["login"];
		$enteredPassword = $_POST["password"];

		if ($enteredLogin === $correctLogin && $enteredPassword === $correctPassword) {
			$_SESSION["auth"] = 1;
		} else {
			header("Location: http://site12.ru/index.php");
			exit();
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/admin.css">
	<title>ЗАО "Русская косметика"</title>
</head>
<body>
	<main class="main-body">
		<div><a href="http://localhost/index.php">Выйти</a></div>
		<div>
			<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "RussianСosmetics";

// Создаем соединение
$db = new mysqli($servername, $username, $password, $database);

// Проверяем соединение
if ($db->connect_error) {
    die("Ошибка подключения: " . $db->connect_error);
}

// SQL-запрос для получения данных из нескольких таблиц с использованием LEFT JOIN
$sql = "SELECT Orders.id as id, Orders.order_number as order_number, Orders.date_creation as date_creation,
  Individual.firstname as Ifirstname, Individual.name as Iname, Individual.surname as Isurname,
  Entity.FNS_client as Eclient, Status.status as status, Orders.date_closing as date_closing,
  Employee.firstname as Efirstname, Employee.name as Ename, Employee.sirname as Esurname, Orders.time as time
    FROM Orders
  LEFT JOIN Individual ON Orders.client_code_ind = Individual.client_code
  LEFT JOIN Entity ON Orders.client_code_ent = Entity.code_client
  LEFT JOIN Status ON Orders.id_status = Status.id
  LEFT JOIN Employee ON Orders.id_employee = Employee.id";

// Выполнение запроса
$result = $db->query($sql);

// Проверка на ошибки
if (!$result) {
    die("Ошибка выполнения запроса: " . $db->error);
}

// Извлечение и обработка результатов
while ($row = $result->fetch_assoc()) {
    print_r($row);
}

// Закрытие соединения
$db->close();
?>
		</div>
	</main>
</body>
</html>