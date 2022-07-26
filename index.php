<?php


if(empty($_POST)) {
    include 'index.html';
} else {


    $login = !empty($_POST['login']) ? $_POST['login'] : '';//тернарный оператор
    $password = !empty($_POST['password']) ? $_POST['password'] : '';
    $repeatPassword = !empty($_POST['repeatPassword']) ? $_POST['repeatPassword'] : '';
    $user = !empty($_POST['user']) ? $_POST['user'] : '';
    $age = !empty($_POST['age']) ? $_POST['age'] : '';
    $pol = !empty($_POST['pol']) ? $_POST['pol'] : '';
    if(strlen($password)<6) {
        echo "Пароль содержит меньше 6 символов!";
        include 'index.html';
    }
    elseif ($repeatPassword != $password){
        echo "Пароли не совпадают, пожалуйста, заполните форму еще раз!";
        include 'index.html';
    }
    elseif ($age < 18) {
        echo 'Вам сюда нельзя!';
    }
    elseif ($user != '') {
        echo 'Привет!';

        try {
            //подключение к БД
            $db = new PDO('mysql:host=localhost;dbname=itrem', 'root', 'root');
        } catch (PDOException $e) {
            //при наличиек ошибки выводит ее
            print "Что-то пошло не так. Ошибка!: " . $e->getMessage() . "<br/>";//???getMessage
        }
        // собираем данные для запроса
        $data = array('login' => $login, 'password' => $password, 'user' => $user, 'age' => $age, 'pol' => $pol);
        // подготавливаем SQL-запрос
        $query = $db->prepare("INSERT INTO messages (login, password, user, age, pol) values (:login, :password, :user, :age, :pol)");
        // выполняем запрос с данными
        $query->execute($data);
        if ($data) {
            echo " Вы успешно зарегались!";
        }
    }

}


?>
<html>
<head>
    <title>Обработка POST-запроса</title>
</head>
<body>

</body>
</html>