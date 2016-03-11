<script src="/JavaScripts/Authorization.js"></script>


<div id="loginModal" class="modal fade ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Авторизация</h4>
            </div>
            <div class="modal-body" id="modalFormLogin">
                <form id="reg" action="/index.php?cont=Site&act=Registration" method="post" >
                    <div class="form-group">
                        <label class="control-label" for="name">Имя</label>
                        <input type="text"  class="form-control" name="name" id="name" placeholder="Имя"
                               data-container="body" data-toggle="popover" data-placement="right"
                               data-content="Только буквы и '-'">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="surname">Фамилия</label>
                        <input type="text"  class="form-control" name="surname" id="surname" placeholder="Фамилия"
                               data-container="body" data-toggle="popover" data-placement="right"
                               data-content="Только буквы и '-'">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="username">Логин</label>
                        <input type="text"  class="form-control" name="username" id="username" placeholder="Логин"
                               data-container="body" data-toggle="popover" data-placement="right"
                               data-content="Только латинские буквы a-z, цифры и &quot; _ -&quot;" >
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Пароль</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Пароль"
                               data-container="body" data-toggle="popover" data-placement="right"
                               data-content="Пароль должен состоять от 5 символов и без знаков пробела">
                    </div>
                    <div class="text-right"><a id="authorization" href="#" class="pull-left">Авторизция</a>
                        <button type="submit" class="btn btn-primary ">Регистрация</button>
                    </div>
                </form>

                <form id="auth" action="/index.php?cont=Site&act=Login" method="post">
                    <div class="form-group">
                        <label class="control-label" for="usernameIn">Логин</label>
                        <input type="text"  class="form-control" name="username" id="usernameIn" placeholder="Логин">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="passwordIn">Пароль</label>
                        <input type="password" class="form-control" id="passwordIn" name="password" placeholder="Пароль">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember"> Запомнить меня</label>
                        <a id="registration" href="#" class="pull-right">Регистрация</a>
                    </div>
                    <div style="text-align: right">
                        <button type="submit" class="btn btn-default " >Войти</button></div>
                </form>
            </div>
        </div>
    </div>
</div>