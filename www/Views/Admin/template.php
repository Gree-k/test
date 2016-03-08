<?php
if (empty($_SESSION['access']) || 'admin' != $_SESSION['access']) {
    \App\Classes\View::mainPage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
    <script src="https://yastatic.net/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://yastatic.net/jquery-ui/1.11.2/jquery-ui.min.js"></script>
    <script src="/JavaScripts/bootstrap.js"></script>
    <link rel="stylesheet" href="/Views/Style/adminStyle.css">
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Панель администратора</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">На сайт</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="/index.php?cont=Admin&act=All">Новости</a></li>
                <li><a href="/index.php?cont=Admin&act=AllImg">Галерея</a></li>
                <li><a href="#">Пользователи</a></li>
                <li><a href="#">Коментарии</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <?php include __DIR__ . '/' . $file;?>

        </div>
    </div>
</div>
</body>
</html>