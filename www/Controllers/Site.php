<?php
namespace App\Controllers;

use App\Classes\View;
use App\Models\User;

class Site {

    public function actionLogin() {
        $user=User::findByColumn('username', $_POST['username']);
        if (!empty($user) && 1==count($user)) {
            $user = $user[0];
            if ($user->password == $_POST['password']) {
                $_SESSION['username']=$user->username;
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
            $_SESSION['username']=$user->username;
        }
        View::mainPage();

    }
}