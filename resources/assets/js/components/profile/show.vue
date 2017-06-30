<template>

    <div class="bg-white b box-shadow" v-show="status.load">

        <div class="alert alert-warning fade in no-radius b" role="alert" v-if="!status.self && user.occupancy > 4">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true" class="text-lg">×</span></button>
            <h4>Завершенность профиля!</h4>

            <p>
                Чем больше данных о себе сообщите, тем лучше. Максимально полно заполненный профиль дает больше шансов на то, что вас привлекут к проектам.
            </p>
            <p class="m-t-sm">
                <button type="button" class="btn btn-sm btn-link btn-rounded" data-dismiss="alert" aria-label="Close">
                    Напомните позже
                </button>
                <router-link :to="{ name: 'edit' }" class="btn btn-sm btn-default btn-rounded">Заполнить профиль
                </router-link>
            </p>
        </div>


        <div class="wrapper-md">

            <div class="row m-b-md padder-b">
                <div class="col-md-4">
                    <img v-bind:src="user.avatar" class="img-responsive">
                </div>
                <div class="col-md-8">

                    <div class="row">
                        <h3 class="text-info m-t-xs">{{user.name}}</h3>
                    </div>


                    <div class="row">
                        <div class="col-md-8 no-padder">
                            <p>ИНН: {{user.inn}}</p>
                            <p>ОГРН: {{user.ogrn}} </p>
                            <p class="text-muted small">
                                <span v-if="user.phone"><i class="icon-phone text-info m-r-xs"></i>| {{user.phone}} <br></span>
                                <span v-if="user.email"><i class="icon-envelope text-info m-r-xs"></i>| {{user.email}} <br></span>
                                <span v-if="user.city"><i class="icon-location-pin text-info m-r-xs"></i>| {{user.city.name}} <br></span>
                                <span v-if="user.size_company"><i class="icon-people text-info m-r-xs"></i>| {{optionsSize[user.size_company]}} <br></span>
                                <a v-bind:href="user.website" taget="_blank" class="text-ellipsis"
                                   v-if="user.website"><i
                                        class="icon-globe text-info m-r-xs"></i>| {{user.website}}</a> <br>

                            </p>
                        </div>
                        <div class="col-md-4 no-padder text-center">

                            <div v-if="status.self">
                                <p>
                                    <a v-on:click="fave()" class="btn btn-icon btn-rounded b b-info b-2x m-r-sm"
                                       v-bind:class="{ 'btn-info': user.fave }">
                                        <i class="icon-star text-info" v-bind:class="{ 'text-white': user.fave }"></i>
                                    </a>


                                    <a href="#" class="btn btn-icon btn-rounded b b-info b-2x"><i
                                            class="icon-speech text-info"></i></a>
                                </p>
                                <p class="small text-info text-xs">Рейтинг компании</p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12">


                    <p>{{user.specialization}}</p>

                    <div class="row tags text-md padder-v text-center b-b b-t">
                            <span v-for="tag in user.tags">
                                <router-link :to="'/companies?tags='+ tag.slug" class="label">
                                    {{tag.name}}
                                </router-link>
                            </span>
                    </div>
                </div>
            </div>

            <div class="row m-t-md m-b-md padder-v b-b">
                <div class="col-md-12">
                    <main v-html="user.about"></main>
                </div>
            </div>

            <div class="row m-t-md m-b-md padder-v">
                <div class="col-md-12">
                    <p class="padder text-muted small"><i class="icon-direction text-info m-r-xs"></i>
                        | {{user.address}}</p>
                    <div class="google-maps">
                        <a v-on:click="getDirections">
                            <img v-bind:src="
                        'https://maps.googleapis.com/maps/api/staticmap?center='+
                        user.address +
                        '&zoom=14&size=1000x300&maptype=roadmap%20' +
                         '&markers=size:mid%7Ccolor:red%7C%' +
                         user.address +
                         '&key=AIzaSyDI13AXsXcmPWKBfdNb-0lLKjMkGlpdC-E'"
                                 class="img-responsive center">
                        </a>
                    </div>

                    <div class="get-directions hidden">
                        <form action="http://maps.google.com/maps" method="get" target="_blank">
                            <input type="text" name="saddr" placeholder="Введите свой адрес"/>
                            <input type="hidden" name="daddr" v-model="user.address">
                        </form>
                    </div>


                </div>
            </div>
        </div>



        <div class="col-xs-12 m-t-md bg-white b box-shadow hidden-xs hidden-sm" v-if="user.similars.length > 0">


            <div class="m-t-md">
                <h4 class="l-h-1x">Конкуренты:</h4>
            </div>

            <article class="col-md-12 padder-v" v-for="similar in user.similars">
                <div class="row v-center">

                    <div class="col-md-2">
                    <div class="thumb-lg">
                        <a href="#"><img
                                v-bind:src="similar.avatar"
                                class="img-responsive"></a>
                    </div>
                    </div>
                    <div class="col-md-10">
                    <div class="wrapper-md">
                        <div>
                            <p class="h4 m-b-xs"><a
                                    href="#">{{similar.name}}</a>
                            </p>
                            <p class="text-xs">
                                {{similar.specialization}}
                            </p>
                        </div>

                    </div>
                    </div>
                </div>
            </article>

        </div>


    </div>




</template>


<script>
    export default {
        props: ['id'],
        data: function () {
            return {
                optionsSize: {
                    myself: '1 человек',
                    xsmall: '2 - 10 человек',
                    small: '11 - 100 человек',
                    medium: '101 - 1000 человек',
                    big: '1001 - 10000 человек',
                    xbig: '10001 и более человек'
                },
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
                    fave: false,
                    similars: [],
                },
                status: {
                    load: false,
                    submit: false,
                    self: false,
                },
            }
        },
        mounted() {
            this.load(this.$route.params.id)
        },
        watch: {
            '$route.params.id'(newId, oldId) {
                this.load(newId)
            }
        },
        methods: {
            load: function (id) {
                $('#adb').show();

                axios.post(`/profile/` + id)
                    .then(response => {
                        this.user = response.data;
                        this.status.load = true;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    });

                if (id !== window.meta_user) {
                    this.status.self = true;
                } else {
                    this.status.self = false;
                }
            },
            fave: function () {
                if (!this.status.submit) {
                    this.status.submit = true;
                    axios.put(`/profile/fave/` + this.$route.params.id);
                    this.user.fave = !this.user.fave;
                    this.status.submit = false;
                }
            },
            getDirections: function () {
                let saddr = '?saddr=' + 'Сумская ул., 45А, Курск, Курская обл., 305007';
                let daddar = '&daddr=' + this.user.address;
                window.open('http://maps.google.com/maps' + saddr + daddar, '_blank');
            },
            getSize: function () {
                this.optionsSize.forEach(function (item, i, arr) {



                        });
            }
        }
    }
</script>
