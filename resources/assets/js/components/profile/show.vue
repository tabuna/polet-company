<template>


    <div v-show="status.load">
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
                    <a href="#">
                        <img src="https://maps.googleapis.com/maps/api/staticmap?center=%D0%9B%D0%B8%D0%BF%D0%B5%D1%86%D0%BA&zoom=13&size=1000x300&maptype=roadmap%20&markers=size:mid%7Ccolor:red%7C%D0%9B%D0%B8%D0%BF%D0%B5%D1%86%D0%BA&key=AIzaSyDI13AXsXcmPWKBfdNb-0lLKjMkGlpdC-E"
                             class="img-responsive center">
                    </a>
                </div>

                <div class="get-directions hidden">
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
                    fave: false,
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
                let user = localStorage.getItem('profile.' + id);

                if (user === null || (user.timeLoad + 90000) < new Date().getTime()) {

                    axios.post(`/profile/` + id)
                        .then(response => {
                            this.user = response.data;
                            this.status.load = true;

                            this.user.timeLoad = new Date().getTime();
                            localStorage.setItem('profile.' + id, JSON.stringify(this.user))
                        })
                        .catch(e => {
                            this.errors.push(e)
                        });


                } else {
                    this.user = JSON.parse(user);
                    this.status.load = true;
                }


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
            }
        }
    }
</script>
