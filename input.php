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
//$data = array('login' => $login, 'password' => $password);
//    $query = $db->prepare("SELECT login, password FROM messages WHERE login = :login and password = :password");
//
//    $query->execute($data);
//    $result = $query->fetchAll();
//    //var_dump($data);
//    $nnn = 0;
//    if (count($result)) {
//
//        foreach($result as $row) {
//            $nnn = 1;
//        }
//    } else {
//        echo "Ошибка логина!";
//    }
//    if($nnn == 1) {
//        print_r($data['login']);
//        echo '! Вы успешно прошли авторизацию!';
//    }
    $data1 = array('login' => $login);
    $query = $db -> prepare("SELECT login FROM messages WHERE login = :login");
    $query->execute($data1);
    $result = $query -> fetchAll();
    //var_dump($data);
    $nnn = 0;
    $mmm = 0;
    if (count($result)) {
        foreach($result as $row) {
            $nnn = 1;
        }
    } else {
        echo "Ошибка логина!";
    }

    $data2 = array('password' => $password);
    $query = $db -> prepare("SELECT password FROM messages WHERE password = :password");
    $query -> execute($data2);
    $result = $query -> fetchAll();
    echo '<br>';
    if (count($result)) {

        foreach($result as $row) {
            $mmm = 1;
        }
    } else {
        echo "Ошибка пароля!";
    }
    if($nnn == 1 && $mmm == 1) {
        print_r($data1['login']);
        echo '! Вы успешно прошли авторизацию!';
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