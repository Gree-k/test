<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/JavaScripts/bootstrap.js"></script>
    <link rel="stylesheet" href="/Views/style.css">
    <script src="/JavaScripts/Authorization.js"></script>
</head>
<body>

<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Новости</a></li>
                <li><a href="#">Галерея</a></li>
                <li><a href="#">Змейка</a></li>
            </ul>
            <div class="navbar-right" style="padding-top: 7px;">
                <?php if (isset($_SESSION['username'])):?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" data-toggle="dropdown">
                            <?=$_SESSION['username'];?> <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Например ЛК</a></li>
                            <li><a href="#">Если Админ то Админ панель</a></li>
                            <li><a href="#">Что-то иное</a></li>
                            <li class="divider"></li>
                            <li><a href="/index.php?cont=Site&act=Logout">Выход</a></li>
                        </ul>
                        <a class="btn btn-default" href="/index.php?cont=Site&act=Logout">
                            <span class="glyphicon glyphicon-log-out"></span></a>
                    </div>
                <?php else: ?>
                    <button type="button" id="login" class="btn btn-default" style="padding-left: 7px;"><span
                            class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Вход
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php include __DIR__ . '/' . $file; ?>
    </div>
</div>



<div id="footer">
    <div class="container">
        <p class="text-muted">&copy; made by <a href="#">Greek</a></p>
    </div>
</div>


<div id="loginModal" class="modal fade ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Авторизация</h4>
            </div>
            <div class="modal-body" id="modalFormLogin">
                <!--форма авторизации-->
            </div>
        </div>
    </div>
</div>


</body>
</html>
