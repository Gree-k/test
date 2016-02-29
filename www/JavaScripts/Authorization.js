$(function () {
    $('#login').click(function () {
        authorization();
        $('#loginModal').modal('show');
    });
    $('body').on('click','#authorization' ,function(e){
        e.preventDefault();
        authorization();
    });

});
$(function(){
    $('body').on('click','#registration' ,function(e){
        e.preventDefault();
        $('.modal-title').text('Регистрация');
        $('#modalFormLogin').empty().append('' +
            '<form action="/index.php?cont=Site&act=Registration" method="post">' +
            '<table id="tableForm">' +
            '<tr><th>Имя</th>' +
            '<td><input type="text"  class="form-control" name="name"></td></tr>' +
            '<tr><th>Фамилия</th>' +
            '<td><input type="text"  class="form-control" name="surname"></td></tr>' +
            '<tr><th>Логин</th>' +
            '<td><input type="text"  class="form-control" name="username"></td></tr>' +
            '<tr><th>Пароль</th>' +
            '<td><input type="password"  class="form-control" name="password"></td></tr>' +
            '<tr><th rowspan="2"></th>' +
            '<td><a id="authorization" href="#" class="pull-right">Авторизция</a></tr>' +
            '<tr><td><input type="submit" class="btn btn-primary pull-right"  value="Регистрация" ></td></tr>' +
            '</table></form>');

    })
});
function authorization() {
    $('.modal-title').text('Авторизация');
    $('#modalFormLogin').empty().append('' +
        '<form action="/index.php?cont=Site&act=Login" method="post">' +
        '<table id="tableForm">' +
        '<tr><th>Логин</th>' +
        '<td><input type="text"  class="form-control" name="username"></td></tr>' +
        '<tr><th>Пароль</th>' +
        '<td><input type="password"  class="form-control" name="password"></td></tr>' +
        '<tr><th rowspan="2"></th>' +
        '<td><input type="checkbox" name="remember"> Запомнить меня' +
        '<a id="registration" href="#" class="pull-right">Регистрация</a></tr>' +
        '<tr><td><input type="submit" class="btn btn-primary pull-right" value="Войти" ></td></tr>' +
        '</table></form>');

}
