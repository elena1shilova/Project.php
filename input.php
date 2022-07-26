<?php

if(empty($_POST)) {
    include 'input.html';
} else {
    $login = !empty($_POST['login']) ? $_POST['login'] : '';
    $password = !empty($_POST['password']) ? $_POST['password'] : '';

    if ($login != '') {
        try {
            //подключение к БД
            $db = new PDO('mysql:host=localhost;dbname=itrem', 'root', 'root');
        } catch (PDOException $e) {
            //при наличиек ошибки выводит ее
            print "Что-то пошло не так. Ошибка!: " . $e->getMessage() . "<br/>";//???getMessage

        }


        }

}




?>
<html>
<head>
    <title>Обработка данных входа</title>
</head>
<body>

</body>
</html>