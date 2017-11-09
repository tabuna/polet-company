$( document ).ready(function() {

    $('.aside-affix').affix({
        offset: {
            top: function () {

                if (document.getElementById('content')) {
                    let top = $('content').outerHeight(true)
                }else{
                    let top = 0;
                }

                console.log($('#header').outerHeight(true) + top + 15);
                return (this.top = $('#header').outerHeight(true) + top + 15)
            },
            bottom: function () {
                return (this.bottom = $('#footer').outerHeight(true) + 20)
            }
        }
    })

});
