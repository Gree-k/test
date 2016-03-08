$(document).ready(function(){
    var modalRename = $('#modalRename');
    var input = $('#newName');

    $('body').on('click','.rename' ,function(e){
        e.preventDefault();
        //var modalRename = $('#modalRename');
        //$('.modal-title').text($(this).data('name'));
        $('#modalFormRename').attr('action', $(this).attr('href'));
        input.val($(this).data('name'));
        modalRename.removeClass('has-error');
        modalRename.removeClass('has-success');
        modalRename.modal('show');
    })

    $('body').on('keyup','#newName' ,function(){
        if(input.val().trim()==0) {
            modalRename.addClass('has-error');
        }else {
            $.post('/index.php?cont=Site&act=TestName',
                {
                    name: input.val().trim()
                }
            ).done(function(data) {
                    if (data != 0) {
                        modalRename.addClass('has-error');
                    } else {
                        if(modalRename.hasClass('has-error')) {
                            modalRename.removeClass('has-error').addClass('has-success');
                        }else {
                            modalRename.addClass('has-success');
                        }
                    }
                })
        }
    })

    $('#sendName').click(function(e){
        if(modalRename.hasClass('has-error') || input.val().trim()==0){
            e.preventDefault();
        }else {
            $(this).submit();
        }
    })
});