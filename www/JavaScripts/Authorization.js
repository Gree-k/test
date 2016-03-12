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
    $('body').on('keyup', '#reg input', function () {
        var div = $(this).parent();

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
            return true;
        } else {
            return false;
        }
    }
});
$(function(){
    $('#loginModal [type=submit]').click(function (e) {
        e.preventDefault();
        var form= $(this).parent().parent();
        if(form.children('.has-error').size()!=0) {
            return ;
        }
        $.post({
            url: form.attr('action'),
            data: form.serialize(),
            success: function(data) {
                if(data){
                    location.reload();
                }else{
                    if('auth'==form.attr('id')){
                        $('#alertAuth').show();
                    }else {
                        $('#alertReg').show();
                    }
                }
            }
        })

    });

    $('.alert .close').click(function(){
        $('#alertAuth').hide();
        $('#alertReg').hide();
    })
    $('#closeModal').click(function(){
        $('.modal-body').each(function() {
            $('input').popover('hide');
            $('#loginModal').modal('hide');
        });
    })
})