<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Views/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
                <li class="active"><a href="#">Новости</a></li>
                <li><a href="#about">Галерея</a></li>
                <li><a href="#contact">Змейка</a></li>
            </ul>
            <div class="navbar-right" style="padding-top: 7px;">
                <div class="btn-group">
                    <button type="button" class="btn btn-default">Вход</button>
                    <button type="button" class="btn btn-default">Регистрация</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="blog-header">

        <p class="lead blog-description">Тестовый вариант новостной ленты</p>
    </div>

    <div class="row">
            <?php include __DIR__ . '/' . $file ;?>
    </div>

</div>


<div id="footer">
    <div class="container">
        <p class="text-muted">&copy; made by <a href="#">Greek</a></p>
    </div>
</div>
<!--<div class="blog-footer">-->
<!--    <p>made by <a href="#">Greek</a></p>-->
<!--    <p>-->
<!--        <a href="#">Back to top</a>-->
<!--    </p>-->
<!--</div>-->


<!--<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">-->
<!--    Посмотреть демо-->
<!--</button>-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Название модали</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Сохранить изменения</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
