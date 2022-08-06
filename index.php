<?php


if(empty($_POST)) {
    include 'index.html';
} else {


    $login1 = !empty($_POST['login1']) ? $_POST['login1'] : '';//тернарный оператор
    $password1 = !empty($_POST['password1']) ? $_POST['password1'] : '';
    $repeatPassword1 = !empty($_POST['repeatPassword1']) ? $_POST['repeatPassword1'] : '';
    $age1 = !empty($_POST['age1']) ? $_POST['age1'] : '';
    $login2 = !empty($_POST['login2']) ? $_POST['login2'] : '';//тернарный оператор
    $password2 = !empty($_POST['password2']) ? $_POST['password2'] : '';
    $repeatPassword2 = !empty($_POST['repeatPassword2']) ? $_POST['repeatPassword2'] : '';
    $age2 = !empty($_POST['age2']) ? $_POST['age2'] : '';
    if(strlen($password1)<6) {
        echo "Пароль №1 содержит меньше 6 символов!";
        include 'index.html';
    }
    elseif(strlen($password2)<6) {
        echo "Пароль №2 содержит меньше 6 символов!";
        include 'index.html';
    }
    elseif ($repeatPassword1 != $password1){
        echo "Пароли №1 не совпадают, пожалуйста, заполните форму еще раз!";
        include 'index.html';
    }
    elseif ($repeatPassword2 != $password2){
        echo "Пароли №2 не совпадают, пожалуйста, заполните форму еще раз!";
        include 'index.html';
    }
    elseif ($age1 < 18&&$age2 < 18) {
        echo 'Кому-то сюда нельзя!';
    }
    else {
        echo 'Привет!';

        try {
            //подключение к БД
            $db = new PDO('mysql:host=localhost;dbname=itrem', 'root', 'root');
        } catch (PDOException $e) {
            //при наличиек ошибки выводит ее
            print "Что-то пошло не так. Ошибка!: " . $e->getMessage() . "<br/>";//???getMessage
        }
        // собираем данные для запроса
        $data = [
                ['login' => $login1, 'password' => $password1, 'age' => $age1],
                ['login' => $login2, 'password' => $password2, 'age' => $age2]
            ];
        // подготавливаем SQL-запрос
        $query = $db->prepare("INSERT INTO new (login, password, age) values (:login, :password, :age)");
        $query->execute($data[0]);
        $query = $db->prepare("INSERT INTO new (login, password, age) values (:login, :password, :age)");
        $query->execute($data[1]);
        if ($data) {
            echo " Вы успешно зарегистрировались!";
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