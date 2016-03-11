$(function () {
    $('#login').click(function () {
        $('#reg').hide();
        $('#auth').show();
        $('#loginModal').modal('show');
    });
    $('body').on('click','#authorization' ,function(e){
        e.preventDefault();
        $('#reg').hide();
        $('#auth').show();
    });

    $('body').on('click','#registration' ,function(e){
        e.preventDefault();
        $('#auth').hide();
        $('#reg').show();
    })

});


$(function () {
    $('body').on('keyup', '#modalFormLogin input', function () {
        var div = $(this).parent();

        if($(this).attr('id')=='passwordIn' || $(this).attr('id')=='usernameIn') {
            return ;
        }

        if (valid($(this).attr('id'), $(this).val().trim())) {
            if (div.hasClass('has-error')) {
                div.removeClass('has-error');
            }
            div.addClass('has-success');
            $(this).popover('hide');
        } else {
            div.addClass('has-error');
            $(this).popover('show');
        }

    });

    function valid(type, str) {
        var regExp = '';
        if (type == 'username') {
            regExp = /^[a-zA-Z][a-zA-Z0-9_\.-]*$/;
        } else if (type == 'password') {
            regExp = /^[\S]{5,}$/;
        } else if (type == 'name' || type == 'surname') {
            regExp = /^[a-zA-Zа-яА-Я-]+$/;
        } else {
            return false;
        }

        if (str.match(regExp)) {
            //location.reload();
            return true;
        } else {
            return false;
        }

    }

});
