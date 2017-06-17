$(document).load(function () {
    $('#editor').wysiwyg();
    $(".dropdown-menu > input").click(function (e) {
        e.stopPropagation();
    });
});