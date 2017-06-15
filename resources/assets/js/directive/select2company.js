Vue.directive('selectcompanytag', {
    inserted: function (el, binding, vnode) {
        var key = binding.expression;

        var select = $(el);

        select.select2({
            placeholder: 'Введите ключевые слова',
            templateResult: function formatState (state) {
                if (!state.id || !state.count) { return state.text; }

                return $('<span>' + state.text + '</span>' +' <span class="pull-right badge bg-info">' + state.count + '</span>');
            },
            width: '100%',
            tags: true,
            cache: true,
            ajax: {
                url: function (params) {
                    return '/profile/tags/' + params.term;
                },
                delay: 250,
                processResults: function (data, page) {
                    return {
                        results: data
                    };
                }
            },
            "language": {
                "noResults": function(){
                    return "Указанного тега нет, но вы можете быть первым кто его использует!";
                }
            },
        });
        select.on('change', function () {
            Vue.set(vnode.context, key, select.val());
        });
    },
    unbind: function (el, binding, vnode) {
        var select = $(el);
        select.select2('destroy');
    },
});
