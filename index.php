<?php

function temp($password, $number)
{
    if (strlen($password) < 6) {
        echo 'Пароль №' . $number . ' содержит меньше 6 символов!';
        return true;
    }
    return false;
}
function isConfermPasswordValid($password, $repeatPassword, $number)
{
    if ($repeatPassword != $password) {
        echo 'Пароли №' . $number . ' не совпадают, пожалуйста, заполните форму еще раз!';
        return true;
    }
    return false;
}


if(empty($_POST)) {
    include 'index.html';
} else {
    require_once __DIR__ . 'User.php';
    $userOne = new User($_POST);
    $userTwo = new User($_POST);

    $errors = [];
    $errors[] = temp($userOne->password, 1);
    $errors[] = temp($userTwo->password, 2);
    $errors[] = isConfermPasswordValid($userOne->password, $userOne->repeatPassword, 1);
    $errors[] = isConfermPasswordValid($userTwo->password, $userTwo->repeatPassword, 1);

    foreach ($errors as $error) {
        if ($error) {
            include 'index.html';
            break;
        }
    }

    if ($userOne->age < 18 && $userTwo->age < 18) {
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
                ['login' => $userOne->login, 'password' => $userOne->password, 'age' => $userOne->age],
                ['login' => $userTwo->login, 'password' => $userTwo->password, 'age' => $userTwo->age]
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