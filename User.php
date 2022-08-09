<?php
class User
{
    public $login;
    public $password;
    public $age;
    public $repeatPassword;

    public function __construct($_POST)
    {
        $this->login = $this->setPostParam($_POST, 'login1');//тернарный оператор
        $this->password = $this->setPostParam($_POST, 'password1');
        $this->age = $this->setPostParam($_POST, 'age1');
        $this->repeatPassword = $this->setPostParam($_POST, 'repeatPassword1');
    }

    public function setPostParam($_POST, $value)
    {
        return !empty($_POST[$value]) ? $_POST[$value] : '';
    }
}