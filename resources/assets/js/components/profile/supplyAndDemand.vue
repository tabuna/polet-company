<template>

    <div class="bg-white b box-shadow">
        <div class="wrapper-md">

            <div class="" v-show="status.load">

                <!--
                <div id="filters" class="b-b m-b-xl">
                    <div class="row">

                        <div class="col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Город</label>
                                <multiselect v-model="selectedCity" label="name"
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
                                             :deselectLabel="''"

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

-->
                <div class="">
                    <div class="row m-b ">
                        <div class="col-xs-6"><strong>Спрос: </strong></div>
                        <div class="col-xs-6"><strong>Предложение: </strong></div>

                    </div>
                    <div class="m-b-lg" v-for="(users, index) in demand.data">

                        <div class="row">
                            <div class="m-b v-center col-xs-6">
                                <div class="col-md-3">
                                    <router-link :to="{ name: 'profile', params: { id: users.id }}">
                                        <img v-bind:src="users.avatar" v-bind:alt="users.name"
                                             class="img-responsive thumbnail">
                                    </router-link>
                                </div>
                                <div class="col-md-9">
                                    <h4 class="m-t-xs">
                                        <router-link :to="{ name: 'profile', params: { id: users.id }}">
                                            {{users.name}}
                                        </router-link>
                                    </h4>

                                    <div class="text-warning-dk">
                                        <template v-for="n in [1,2,3,4,5]">
                                            <i v-if="n > getRating(users)" class="fa fa-star-o"></i>
                                            <i v-else class="fa fa-star"></i>
                                        </template>
                                    </div>

                                    <p class="small">
                                        {{users.specialization}}
                                    </p>

                                    <div class="tags">
                                        <span title="Используется данный тег" class="label text-dark"
                                              v-for="tag in users.tags">{{tag.name}}</span>
                                    </div>

                                </div>
                            </div>
                            <div class="m-b v-center col-xs-6" v-if="tmp =  supply.data[index]">


                                <div class="col-md-3 " v-if="supply.data[index]">

                                    <router-link :to="{ name: 'profile', params: { id: tmp.id }}">
                                        <img v-bind:src="tmp.avatar"
                                             v-bind:alt="tmp.name" class="img-responsive thumbnail">
                                    </router-link>
                                </div>
                                <div class="col-md-9" v-if="tmp">
                                    <h4 class="m-t-xs">
                                        <router-link :to="{ name: 'profile', params: { id: tmp.id }}">
                                            {{tmp.name}}
                                        </router-link>
                                    </h4>

                                    <div class="text-warning-dk">
                                        <template v-for="n in [1,2,3,4,5]">
                                            <i v-if="n > getRating(tmp)" class="fa fa-star-o"></i>
                                            <i v-else class="fa fa-star"></i>
                                        </template>
                                    </div>

                                    <p class="small">
                                        {{tmp.specialization}}
                                    </p>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div v-infinite-scroll="loadNextPage" infinite-scroll-disabled="status.submit"
                     infinite-scroll-distance="10" v-if="(demand.data.length !== 0) || (supply.data)">
                    <div class="m-b-lg" v-if="status.submit">
                        <div class="row m-b">
                            <div class="col-xs-12 text-center">
                                <i class='fa fa-2x fa-spinner fa-spin'></i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="jumbotron text-center bg-white not-found" v-if="demand.data.length === 0">

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
        components: {Multiselect},
        props: ['tags'],
        data: function () {
            return {
                tmp:{},
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
                demand: {
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
                supply: {
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
            /*'selectedTags'(newId, oldId){

                let textAllTags = [];
                newId.forEach(function (item, i, arr) {
                    textAllTags.push(item.slug)
                });

                this.query.tags = textAllTags.join(',');
                this.load()
            }*/
        },
        methods: {
            load: function () {
                $('#adb').show();
                let id = meta_user;

                axios.post(`/api/demand`, this.query)
                    .then(response => {
                        this.demand = response.data.demand;
                        this.supply = response.data.supply;
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

                if (this.demand.next_page_url !== null) {
                    this.status.submit = true;

                    axios.post(this.demand.next_page_url, this.query)
                        .then(response => {

                            let oldDataDemand = this.demand.data;
                            oldDataDemand = oldDataDemand.concat(response.data.demand.data);

                            this.demand = response.data.demand;
                            this.demand.data = oldDataDemand;

                            if (this.supply.next_page_url !== null) {
                                let oldDataSupply = this.supply.data;
                                oldDataSupply = oldDataSupply.concat(response.data.supply.data);

                                this.supply = response.data.supply;
                                this.supply.data = oldDataSupply;
                            }
                            this.status.submit = false;


                        })
                        .catch(e => {
                            this.errors.push(e)
                        });

                }else{
                    if (this.supply.next_page_url !== null) {
                        this.status.submit = true;

                        axios.post(this.supply.next_page_url, this.query)
                            .then(response => {

                                let oldDataSupply = this.supply.data;
                                oldDataSupply = oldDataSupply.concat(response.data.supply.data);

                                this.supply = response.data.supply;
                                this.supply.data = oldDataSupply;

                                this.status.submit = false;
                            })
                            .catch(e => {
                                this.errors.push(e)
                            });
                    }
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
            getRating: function (users) {
                let user = users;
                if (user.hasOwnProperty('options') && user.options !== null) {
                    return user.options.rating;
                }
                return 0;
            },
        }
    }
</script>
