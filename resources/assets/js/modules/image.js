$( document ).ready(function() {
    $("body").on("error", 'img',function(){
        $(this).attr('src', '/img/avatar.png');
    });

    $("img").on("error",function(){
        $(this).attr('src', '/img/avatar.png');
    });
});
