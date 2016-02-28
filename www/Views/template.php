<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Views/style.css">
</head>
<body>
<div class="blog-masthead">
<div class="container">
    <nav class="blog-nav">
        <a class="blog-nav-item active" href="/index.php">Новости</a>
        <a class="blog-nav-item" href="#">Галерея</a>
        <a class="blog-nav-item" href="#">Змейка</a>
    </nav>
</div>
</div>
<div class="container">

    <div class="blog-header">

        <p class="lead blog-description">Тестовый вариант новостной ленты</p>
    </div>

    <div class="row">
<!--        <div class="col-sm-8 blog-main">-->
            <?php include __DIR__ . '/' . $file ;?>
<!--        </div>-->

<!--        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">-->
<!--            <div class="sidebar-module sidebar-module-inset">-->
<!--                <h4>About</h4>-->
<!--                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>-->
<!--            </div>-->
<!--        </div>-->

    </div>

<!--    <div class="row marketing">-->
<!--        --><?php //include __DIR__ . '/' . $file ;?>
<!--    </div>-->

<!--    <div class="footer">-->
<!--        <p>&copy; Company 2016</p>-->
<!--    </div>-->

</div>

<div class="blog-footer">
    <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</div>
</body>
</html>
