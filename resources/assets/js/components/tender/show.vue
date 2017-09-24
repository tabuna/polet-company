<template>


    <div class="user-show">
        <div class="col-md-6">
            <div class="bg-white b box-shadow">
                <div class="wrapper-md">

                    <div class="row m-b-md padder-b b-b">
                        <div class="col-md-4">
                            <img v-bind:src="user.avatar" class="img-responsive">
                        </div>
                        <div class="col-md-5 no-padder">
                            <h3 class="text-info m-t-xs">{{user.name}}</h3>
                            <p>ИНН: {{user.inn}}</p>
                            <p>ОГРН: {{user.ogrn}} </p>
                            <p class="text-muted small">
                                <i class="icon-phone text-info m-r-xs"></i>| {{user.phone}} <br>
                                <i class="icon-envelope text-info m-r-xs"></i>| {{user.email}} <br>
                                <i class="icon-globe text-info m-r-xs"></i>| {{user.website}} <br>
                            </p>
                        </div>
                        <div class="col-md-3 no-padder text-center">
                            <p>
                                <a href="#" class="btn btn-icon btn-rounded b b-info b-2x m-r-sm"><i
                                        class="icon-star text-info"></i></a>
                                <a href="#" class="btn btn-icon btn-rounded b b-info b-2x"><i
                                        class="icon-speech text-info"></i></a>
                            </p>
                            <p class="small text-info text-xs">Рейтинг компании</p>
                        </div>
                    </div>

                    <div class="row m-t-md m-b-md padder-v b-b">
                        <div class="col-md-12">
                            <p class="text-justify">
                                {{user.about}}
                            </p>
                        </div>
                    </div>

                    <div class="row m-t-md m-b-md padder-v">
                        <div class="col-md-12">
                            <p><i class="icon-globe"></i> | Россия, Москва, ул. Пушкина, д. 127/43, офис 203, 123499</p>
                            <div class="google-maps">
                                <img src="/img/google.png" class="img-responsive">
                            </div>

                            <div class="get-directions">
                                <form action="http://maps.google.com/maps" method="get" target="_blank">
                                    <input type="text" name="saddr" placeholder="Введите свой адрес"/>
                                    <input type="hidden" name="daddr"
                                           value="Октябрьская ул., 61, Липецк, Липецкая область"/>
                                    <input type="submit" value="Как добраться" class="direction-btn"/>
                                </form>
                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="panel panel-default b box-shadow">
                <div class="panel-heading">
                    <div class="clearfix">
                        <div class="clear">
                            <div class="h4 m-t-xs m-b-xs">
                                Черняев Александр
                                <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i>
                            </div>
                            <small class="text-muted">Представитель компании</small>
                        </div>
                    </div>
                </div>
                <div class="list-group no-radius alt">
                    <a class="list-group-item" href="">
                        <i class="fa fa-comment fa-fw text-muted"></i>
                        Адрес компании
                    </a>
                    <a class="list-group-item" href="">
                        <i class="fa fa-envelope fa-fw text-muted"></i>
                        Спрос
                    </a>
                    <a class="list-group-item" href="">
                        <i class="fa fa-eye fa-fw text-muted"></i>
                        Проедложения
                    </a>
                    <a class="list-group-item" href="">
                        <i class="fa fa-comment fa-fw text-muted"></i>
                        Адрес компании
                    </a>
                    <a class="list-group-item" href="">
                        <i class="fa fa-envelope fa-fw text-muted"></i>
                        Спрос
                    </a>
                    <a class="list-group-item" href="">
                        <i class="fa fa-eye fa-fw text-muted"></i>
                        Проедложения
                    </a>
                </div>
            </div>


            <div class="panel wrapper-md padder-lg b box-shadow-lg text-center">
                <p class="h3 font-thin m-b-sm">Тендер</p>
                <p class="font-bold text-sm">Нужно выполнить работу? Объяви об этом всем</p>
                <p class="small text-muted text-xs">Актуально до 60 дней</p>
                <a href="" class="btn btn-info btn-rounded">Разместить</a>
            </div>


        </div>
    </div>

</template>


<script>
    export default {
        props: ['id'],
        data: function () {
            return {
                user: {
                    name: '',
                    email: '',
                    phone: '',
                    address: '',
                    inn: '',
                    ogrn: '',
                    website: '',
                    about: '',
                    avatar: '',
                }
            }
        },
        beforeMount() {
            axios.post(`/profile/` + this.$route.params.id)
                .then(response => {
                    this.user = response.data
                })
                .catch(e => {
                    this.errors.push(e)
                });
        },
        mounted() {
            this.load();
        },
        methods:{
            load: function () {
                $('#adb').show();
            },
        }
    }
</script>
