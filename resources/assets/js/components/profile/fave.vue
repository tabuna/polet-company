<template>

    <div class="bg-white b box-shadow">
        <div class="wrapper-md">

            <div v-show="status.load">

                <div class="m-b-lg" v-for="fave in favorites.data">
                    <div class="row m-b">
                        <div class="col-md-2">
                            <div class="thumb-lg">
                                <router-link :to="{ name: 'profile', params: { id: fave.id }}">
                                    <img v-bind:src="fave.avatar" v-bind:alt="fave.name" class="img-responsive thumbnail">
                                </router-link>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h3 class="m-t-xs">
                                <router-link :to="{ name: 'profile', params: { id: fave.id }}">
                                      <span v-bind:class="{ 'text-info' : isLooked(fave) }">{{fave.name}}</span>
                                </router-link>
                            </h3>

                            <div class="text-warning-dk">
                                <template v-for="n in [1,2,3,4,5]">
                                        <i v-if="n > getRating(fave)" class="fa fa-star-o"></i>
                                        <i v-else class="fa fa-star"></i>
                                </template>
                            </div>

                            <p class="small">
                                {{fave.specialization}}
                            </p>

                            <div class="tags">
                                <span title="Используется данный тег" class="label text-dark" v-for="tag in fave.tags">
                                    {{tag.name}}
                                </span>
                            </div>

                        </div>
                    </div>
                </div>

                <div v-infinite-scroll="loadNextPage" infinite-scroll-disabled="status.submit"
                     infinite-scroll-distance="10">
                    <div class="m-b-lg" v-if="status.submit">
                        <div class="row m-b">
                            <div class="col-xs-12 text-center">
                                <i class='fa fa-2x fa-spinner fa-spin'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="jumbotron text-center bg-white not-found" v-if="favorites.data.length === 0">

                    <p class="h3 m-b-xl inline b b-dark rounded wrapper-lg">
                        <i class="fa-3x w-1x icon-star"></i>
                    </p>

                    <h4 class="m-t-none">Список избранных компаний пуст</h4>

                    <p class="text-muted m-t-lg">
                        Добавьте компанию в избранное и она будет отображаться тут
                    </p>

                </div>


            </div>


        </div>
    </div>
</template>


<script>
    export default {
        data: function () {
            return {
                favorites: {
                    current_page: 0,
                    data: [],
                    from: 0,
                    last_page: [],
                    next_page_url: null,
                    path: null,
                    per_page: null,
                    prev_page_url: null,
                    to: 0,
                    total: 0,
                },
                status: {
                    load: false,
                    submit: false,
                    self: false,
                },
            }
        },
        mounted() {
            this.load()
        },
        methods: {
            load: function () {
                $('#adb').show();
                let id = meta_user;

                axios.post(`/api/profile/fave`)
                    .then(response => {
                        this.favorites = response.data;
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
            loadNextPage: function () {

                if (this.favorites.next_page_url !== null) {
                    this.status.submit = true;

                    axios.post(this.favorites.next_page_url)
                        .then(response => {

                            let oldData = this.favorites.data;
                            oldData = oldData.concat(response.data.data);

                            this.favorites = response.data;
                            this.favorites.data = oldData;

                            this.status.submit = false;
                        })
                        .catch(e => {
                            this.errors.push(e)
                        });
                }
            },
            getRating: function(user){
                if(user.hasOwnProperty('options') && user.options !== null){
                    return user.options.rating;
                }
                return 0;
            },
            isLooked: function (user) {
                if(user.looked_user === undefined){
                    return false;
                }
                return user.looked_user.length;
            }
        }
    }
</script>
