window.onload=function(){

    $(function () {
        $('#carouselRight').click(function(){
            if($('#arrImg li:last').css('display')!='none' || $('#arrImg').children().length==0){
                $.getJSON('/index.php?cont=Site&act=MoreImg',
                    {
                        size: $('#arrImg').children().size(),
                        need: "4"
                    })
                    .done( function (data) {
                        $.each(data, function (key, obj) {
                            $.each(obj, function (ke, ob) {
                                if($('#arrImg').children().length > 3) {
                                    $('#arrImg li:visible').eq(0).hide();
                                }
                                $("#arrImg").append("<li class='col-xs-2 thumbnail'>" +
                                    "<a href='"+ ob['url'] +"' data-author='"+ ob['username'] +"' " +
                                    "data-size='"+ ob['size'] +"'  data-views='"+ ob['views'] +"' " +
                                    "data-likes='"+ ob['likes'] +"' ><img  src='"+ ob['url_mini']+"'></a></li>");
                            });
                        })
                    });
            }else{
                for(var i=0; i<4;i++) {
                    if($('#arrImg li:last').css('display')=='none') {
                        $('#arrImg li:visible').eq(3).next().show();
                        $('#arrImg li:visible').eq(0).hide();
                    }
                }
            }
        }).trigger("click");


        $('#carouselLeft').click(function(){
            for(var i=0; i<4;i++) {
                if($('#arrImg li:first').css('display')=='none') {
                    $('#arrImg li:visible').eq(3).hide();
                    $('#arrImg li:visible').eq(0).prev().show();
                }
            }
        })
    });

    $(function () {
        $('body').on('click','#arrImg a' ,function(e){
            e.preventDefault();

            $('#author').text(this.getAttribute('data-author'));
            $('#size').text(this.getAttribute('data-size'));
            $('#mainImg').attr('href', this.href);
            $('#mainImg img').attr('src', this.href);
            $('#likes').text(' ' + this.getAttribute('data-likes'));
            $('#views').text(' ' + this.getAttribute('data-views'));
        });
    });

};