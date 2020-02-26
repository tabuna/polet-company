<template>

    <div class="bg-white b box-shadow">
        <div class="wrapper-md">

            <div class="" v-show="status.load">
                <div id="filters" class="b-b m-b-xl">
                    <div class="row m-b-xs">
                        <div class="col-md-12">

                            <strong>Найдено {{offers.total}} компаний</strong>

                            <button type="submit" id="button-filter" class="btn btn-default pull-right"><i
                                    class="icon-equalizer"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Город</label>
                                <multiselect v-model="selectedCity"  label="name"
                                             track-by="id"
                                             placeholder="Введите город"
                                             :options="allCity"
                                             :multiple="false"
                                             :searchable="true"
                                             :options-limit="5"
                                             :limit="5"
                                             :loading="isLoadingCity"
                                             @search-change="asyncFindCity"
                                             :taggable="false"
                                             :selectLabel="''"
                                             :selectedLabel="''"
                                             :deselectLabel ="''"

                                >
                                    <template slot="option" scope="props">
                                        <div class="option__desc">
                                            <span class="option__title">{{ props.option.name }}</span>
                                        </div>
                                    </template>


                                    <span slot="noResult">К сожалению, элементов не найдено.</span></multiselect>
                            </div>
                        </div>

                    </div>

                </div>


                <div class="m-b-lg" v-for="user in offers.data">
                    <div class="row m-b v-center">
                        <div class="col-md-3">
                                <router-link :to="{ name: 'profile', params: { id: user.id }}">
                                <img v-bind:src="user.avatar" v-bind:alt="user.name" class="img-responsive thumbnail">
                                </router-link>
                        </div>
                        <div class="col-md-9">
                            <h3 class="m-t-xs">
                                <router-link :to="{ name: 'profile', params: { id: user.id }}">
                                     <span v-bind:class="{ 'text-info' : isLooked(user) }">{{user.name}}</span>
                                </router-link>
                            </h3>

                            <div class="text-warning-dk">
                                <template v-for="n in [1,2,3,4,5]">
                                        <i v-if="n > getRating(user)" class="fa fa-star-o"></i>
                                        <i v-else class="fa fa-star"></i>
                                </template>
                            </div>

                            <p class="small">
                                {{user.specialization}}
                            </p>

                            <div v-if="user.tags !== undefined && user.tags !== null && user.tags.length > 0">
                                <div class="row tags text-md wrapper b-t">
                                    <span class="text-xs block m-b-xs ">Спрос:</span>
                                    <span v-for="tag in user.tags" class="label text-dark pull-left-xs">
                                        {{tag.name}}
                                    </span>
                                </div>
                            </div>

                            <div v-if="user.search_tags !== undefined && user.search_tags !== null && user.search_tags.length > 0">
                                <div class="row tags text-md wrapper b-b b-t">
                                    <span class="text-xs block m-b-xs ">Предложение:</span>
                                    <span v-for="tag in user.search_tags" class="label text-dark pull-left-xs">
                                        {{tag.name}}
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div v-infinite-scroll="loadNextPage" infinite-scroll-disabled="status.submit" infinite-scroll-distance="10">
                    <div class="m-b-lg" v-if="status.submit">
                        <div class="row m-b">
                            <div class="col-xs-12 text-center">
                                <i class='fa fa-2x fa-spinner fa-spin'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="jumbotron text-center bg-white not-found" v-if="offers.data.length === 0">

                    <p class="h3 m-b-xl inline b b-dark rounded wrapper-lg">
                        <i class="fa-3x w-1x icon-people"></i>
                    </p>

                    <h4 class="m-t-none">Компаний не найдено</h4>

                    <p class="text-muted m-t-lg">
                        Попробуйте указать альтернативное теги и подождать.
                    </p>

                </div>



            </div>

        </div>
    </div>

</template>


<script>
    import Multiselect from 'vue-multiselect';
    export default {
        components: { Multiselect },
        props: ['tags'],
        data: function () {
            return {
                selectedCity: [],
                allCity: [],
                selectedTags: [],
                allTags: [],
                isLoading: false,
                isLoadingCity: false,
                query: {
                    tags: null,
                    city: null,
                },
                offers: {
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
            this.load();

        },
        watch: {
            'selectedCity'(newId, oldId) {
                this.query.city = newId;
                this.load()
            },
            'selectedTags'(newId, oldId){

                let textAllTags = [];
                newId.forEach(function(item, i, arr) {
                    textAllTags.push(item.slug)
                });

                this.query.tags = textAllTags.join(',');
                this.load()
            }
        },
        methods: {
            load: function () {
                $('#adb').show();
                let id = meta_user;

                axios.post(`/api/offers`,this.query)
                    .then(response => {
                        this.offers = response.data;
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

                if (this.offers.next_page_url !== null) {
                    this.status.submit = true;

                    axios.post(this.offers.next_page_url,this.query)
                        .then(response => {

                            let oldData = this.offers.data;
                            oldData = oldData.concat(response.data.data);

                            this.offers = response.data;
                            this.offers.data = oldData;

                            this.status.submit = false;
                        })
                        .catch(e => {
                            this.errors.push(e)
                        });
                }
            },
            limitText (count) {
                return `и ${count} ещё тегов`
            },
            asyncFind (query) {
                this.isLoading = true

                axios.get(`/api/profile/tags/` + query)
                    .then(response => {
                        //this.user = response.data;
                        this.status.submit = false;
                        this.allTags = response.data;
                        this.isLoading = false;

                    })
                    .catch(error => {
                        this.errors = error.response.data;
                        this.status.submit = false;

                        swal({
                            title: 'Ошибка!',
                            type: 'error',
                            text: 'Проверьте вводимые данные',
                            timer: 2500,
                            showConfirmButton: false,
                        }).catch(swal.noop)

                    });

            },
            asyncFindCity (query) {
                this.isLoadingCity = true

                axios.post(`/api/other/city/` + query)
                    .then(response => {
                        //this.user = response.data;
                        this.status.submit = false;
                        this.allCity = response.data;
                        this.isLoadingCity = false;

                    })
                    .catch(error => {
                        this.errors = error.response.data;
                        this.status.submit = false;

                        swal({
                            title: 'Ошибка!',
                            type: 'error',
                            text: 'Проверьте вводимые данные',
                            timer: 2500,
                            showConfirmButton: false,
                        }).catch(swal.noop)

                    });

            },
            getRating: function(user){
                if(user.hasOwnProperty('options') && user.options !== null){
                    return user.options.rating;
                }
                return 0;
            },
            isLooked: function (user) {
                return user.looked_user.length;
            }
        }
    }
</script>
