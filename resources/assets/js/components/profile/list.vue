<template>

    <div class="bg-white b box-shadow">
        <div class="wrapper-md">

            <div class="" v-show="status.load">
                <div id="filters" class="b-b m-b-xl">
                    <div class="row m-b-xs">
                        <div class="col-md-12">

                            <strong>Найдено {{users.total}} компаний</strong>

                            <button type="submit" id="button-filter" class="btn btn-default pull-right"><i
                                    class="fa fa-filter"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-8">
                            <div class="form-group">
                                <label class="control-label">Теги</label>
                                <multiselect v-model="selectedTags" id="ajax" label="name"
                                             track-by="slug"
                                             placeholder="Введите ключевые слова"
                                             :options="allTags"
                                             :multiple="true"
                                             :searchable="true"
                                             :loading="isLoading"
                                             :internal-search="false"
                                             :clear-on-select="false"
                                             :close-on-select="false"
                                             :options-limit="5"
                                             :limit="5"
                                             :limit-text="limitText"
                                             @search-change="asyncFind"
                                             :taggable="false"
                                             :selectLabel="''"
                                             :selectedLabel="''"
                                             :deselectLabel ="''"

                                >
                                    <template slot="option" scope="props">
                                        <div class="option__desc">
                                            <span class="option__title">{{ props.option.name }}</span>
                                            <span class="badge bg-info pull-right">{{ props.option.count }}</span>
                                        </div>
                                    </template>


                                    <span slot="noResult">К сожалению, элементов не найдено.</span></multiselect>
                            </div>
                        </div>

                        <div class="col-sm-4">
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


                <div class="m-b-lg" v-for="user in users.data">
                    <div class="row m-b">
                        <div class="col-md-2">
                            <div class="thumb-lg">
                                <router-link :to="{ name: 'profile', params: { id: user.id }}">
                                <img v-bind:src="user.avatar" v-bind:alt="user.name" class="img-responsive">
                                </router-link>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h3 class="m-t-xs">
                                <router-link :to="{ name: 'profile', params: { id: user.id }}">
                                    {{user.name}}
                                </router-link>
                            </h3>

                            <p class="small">
                                {{user.specialization}}
                            </p>

                            <div class="tags">
                                <a href="" class="label" v-for="tag in user.tags">{{tag.name}}</a>
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




                <div class="jumbotron text-center bg-white not-found" v-if="users.data.length === 0">

                    <p class="h3 m-b-xl inline b b-dark rounded wrapper-lg">
                        <i class="fa-3x w-1x icon-people"></i>
                    </p>

                    <h4 class="m-t-none">Компания не найдена</h4>

                    <p class="text-muted m-t-lg">

                        Попробуйте указать альтернативное данные или изменить параметры поиска.

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
                users: {
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

            /*
            this.$route.params.tags

            const tag = {
                id: 1,
                slug: this.$route.params.tags,
                name: newTag,
                count: 0,
            };
            this.selectedTags.push(tag);
            this.allTags.push(tag);
            */


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
                let id = meta_user;

                axios.post(`/companies`,this.query)
                    .then(response => {
                        this.users = response.data;
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

                if (this.users.next_page_url !== null) {
                    this.status.submit = true;

                    axios.post(this.users.next_page_url,this.query)
                        .then(response => {

                            let oldData = this.users.data;
                            oldData = oldData.concat(response.data.data);

                            this.users = response.data;
                            this.users.data = oldData;

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

                axios.get(`/profile/tags/` + query)
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

                axios.post(`/other/city/` + query)
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

            }
        }
    }
</script>
