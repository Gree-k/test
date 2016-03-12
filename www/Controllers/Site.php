<?php
namespace App\Controllers;

use App\Classes\View;
use App\Models\Gallery;
use App\Models\User;

class Site {

    public function actionLogin() {
        $regLogin = '~^[a-zA-Z][a-zA-Z0-9_\.-]*$~';
        $regPass = '~^[\S]{5,}$~';
        $login = trim($_POST['username']);
        $pass = trim($_POST['password']);
        if (preg_match($regLogin, $login) && preg_match($regPass, $pass)) {
            $user=User::getUserByUsername($login);
            if (!empty($user) && 1==count($user)) {
                if ($user->password == $pass) {
                    $_SESSION['username']=$user->username;
                    $_SESSION['access']=$user->access;
                    if (isset($_POST['remember'])) {
                        setcookie('username', $user->username, time() + 60 * 60 * 24);
                    }
                    echo true;
                    exit;
                }
            }
        }
        echo false;

    }

    public function actionLogout() {
        unset($_SESSION['username']);
        unset($_SESSION['access']);
        if (isset($_COOKIE['username'])) {
            setcookie('username', '', time() - 60 * 60 * 24);
        }
        View::mainPage();
    }

    public function actionRegistration() {
        $user = new User();
        foreach ($_POST as $key => $value) {
            $regExp = '';
            if ($key == 'username') {
                $regExp = '~^[a-zA-Z][a-zA-Z0-9_\.-]*$~';
                if(User::presenceDuplicates($key, $value)){
                    echo false;
                    die;
                }
            } else if ($key == 'password') {
                $regExp = '~^[\S]{5,}$~';
            } else {
                $regExp = '~^[a-zA-Zа-яА-Я-]+$~';
            }

            if (preg_match($regExp,$value)) {
                $user->$key = trim($value);
            } else {
                echo false;
                die;
            }

        }
        $user->date=date("Y.m.d H:i:s");
        $fin = $user->save();
        if ($fin) {
            $_SESSION['username'] = $user->username;
        }
        return true;
//        View::mainPage();

    }

    static public function setSessionByCookie() {
        $user = User::getUserByUsername($_COOKIE['username']);
        $_SESSION['username'] = $user->username;
        $_SESSION['access'] = $user->access;
    }

    static public function setSessionAccess() {
        $user = User::getUserByUsername($_SESSION['username']);
        $_SESSION['access']=$user->access;
    }

    //для ajax
    public function actionMoreImg() {

        $images = Gallery::getLast($_GET['size'], $_GET['need'], 'st_user', 'username', 'user_id');
        header('Content-Type: application/json');
        echo json_encode($images);

    }

    public function actionTestName() {
        if(preg_match('~^[а-яa-zА-ЯA-Z0-9 _-]+$~',$_POST['name'])){
            $a=Gallery::presenceDuplicates('name', $_POST['name']);
        }else{
            $a = true;
        }
        echo (int) $a;

    }
}

