<?php
session_start();

class AuthClass {

    private $login = 'admin';
    private $pass = 'adminlobovuh';

    public function logged() {
        if (isset($_SESSION["is_auth"])) {
            return $_SESSION["is_auth"];
        }
        else return false;
    }

    public function login($login, $password) {
        if ($login == $this->login && $password == $this->pass) {
          $_SESSION["is_auth"] = true;
          return true;
        } else {
          $_SESSION["is_auth"] = false;
          return false;
        }
    }


    public function logout() {
        $_SESSION = array();
        session_destroy();
        return true;
    }
}
