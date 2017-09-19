<template>

    <div class="bg-white b box-shadow" v-show="status.load">

        <div class="alert alert-warning fade in no-radius b" role="alert" v-if="status.self && user.occupancy > 4">
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

                            <div v-if="!status.self">
                                <p>
                                    <a v-on:click="fave()" class="btn btn-icon btn-rounded b b-info b-2x m-r-sm"
                                       v-bind:class="{ 'btn-info': user.fave }">
                                        <i class="icon-star text-info" v-bind:class="{ 'text-white': user.fave }"></i>
                                    </a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12">


                    <p>{{user.specialization}}</p>

                    <div class="row tags text-md padder-v text-center b-b b-t">
                        <span v-for="tag in user.tags" class="label text-dark">
                            {{tag.name}}
                        </span>
                    </div>
                </div>
            </div>

            <div class="row m-t-md padder-v">
                <div class="col-md-12">
                    <main v-html="user.about"></main>
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
                        <router-link :to="{ name: 'profile', params: { id: similar.id }}">
                       <img v-bind:src="similar.avatar"
                                class="img-responsive">
                        </router-link>
                    </div>
                    </div>
                    <div class="col-md-10">
                    <div class="wrapper-md">
                        <div>
                            <p class="h4 m-b-xs">
                                <router-link :to="{ name: 'profile', params: { id: similar.id }}">
                                    {{similar.name}}
                                </router-link>
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

            this.status.self = false;
            if (this.$route.params.id === window.meta_user) {
                this.status.self = true;
            }

        },
        watch: {
            '$route.params.id'(newId, oldId) {
                this.load(newId);

                this.status.self = false;
                if (newId === window.meta_user) {
                    this.status.self = true;
                }

            },
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
            },
            fave: function () {
                if (!this.status.submit) {
                    this.status.submit = true;
                    axios.put(`/profile/fave/` + this.$route.params.id);
                    this.user.fave = !this.user.fave;
                    this.status.submit = false;
                }
            },
        }
    }
</script>
