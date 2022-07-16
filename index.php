<?php

// readfile('index.html');
include 'index.html';

$login = !empty($_POST['login']) ? $_POST['login'] : '';
$password = !empty($_POST['password']) ? $_POST['password'] : '';
$user = !empty($_POST['user']) ? $_POST['user'] : '';
$age = !empty($_POST['age']) ? $_POST['age'] : '';
$pol = !empty($_POST['pol']) ? $_POST['pol'] : '';

if($user!='') echo 'Привет!';

?>
<html>
<head>
    <title>Обработка POST-запроса</title>
</head>
<body>

</body>
</html>