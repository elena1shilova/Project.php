<?php

if(empty($_POST)) {
    include 'input.html';
} else {
    $login = !empty($_POST['login']) ? $_POST['login'] : '';
    $password = !empty($_POST['password']) ? $_POST['password'] : '';


        try {
            //подключение к БД
            $db = new PDO('mysql:host=localhost; dbname=itrem', 'root', 'root');
        } catch (PDOException $e) {
            //при наличиек ошибки выводит ее
            print "Что-то пошло не так. Ошибка!: " . $e->getMessage() . "<br/>";//???getMessage
        }
        // собираем данные для запроса
        $data = array('login' => $login, 'password' => $password);
        // подготавливаем SQL-запрос
//        $query = $db->prepare("SELECT * FROM messages where 'login' =:login and 'password' = :password");
        //$query = $db->prepare("SELECT * FROM users WHERE login = '".$login."' and password = '".$password."'");
//        $query = $db->prepare("SELECT * FROM messages WHERE login = :login and password = :password");
//    $query = $db->prepare("SELECT  FROM messages WHERE 'login' = '$login' and 'password' = '$password'");
    $query = $db->prepare("SELECT * FROM messages WHERE login = :login");
        // выполняем запрос с данными
//        $query->execute($data);
    $query->execute(['login'=>$login]);
    $row = $query->fetch();
//        if ($query->execute($data)>0) {
//            echo 'Пользователь не найден!';
//        }
//        else {
//            echo ' Вход выполнен!';
//        }
        if(!empty($row) && password_verify($password, $row['password'])) {
            echo "success id is {$row['id']}";
        } else {
            echo 'fail';
        }

}

//ооп, 10-11



?>
<html>
<head>
    <title>Обработка данных входа</title>
</head>
<body>

</body>
</html>