<?php
namespace App\Controllers;

use App\Classes\View;
use App\Models\Gallery;
use App\Models\User;

class Site {

    public function actionLogin() {
        $user=User::getUserByUsername($_POST['username']);
        if (!empty($user) && 1==count($user)) {
            if ($user->password == $_POST['password']) {
                $_SESSION['username']=$user->username;
                $_SESSION['access']=$user->access;
                if (isset($_POST['remember'])) {
                    setcookie('username', $user->username, time() + 60 * 60 * 24);
                }
                View::mainPage();
            }
        }
        //созать показ сообщения о не верном логине иди пароле
        View::mainPage();
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
            $user->$key = trim($value);
        }
        $user->date=date("Y.m.d H:i:s");
        $fin = $user->save();
        if ($fin) {
            $_SESSION['username'] = $user->username;
        }
        View::mainPage();

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
        $a=Gallery::presenceDuplicates('name', $_POST['name']);
        echo (int) $a;

    }
}

