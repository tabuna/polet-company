<template>

    <div class="bg-white b box-shadow">
        <div class="wrapper-md">

            <div class=""  v-show="status.load">
                <div id="filters" class="b-b m-b-xl">
                    <div class="row m-b-xs">
                        <div class="col-md-12">

                            <strong>Найдено {{tender.total}} предложений</strong>

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
                                             :selectLabel="'Нажмите Enter для выбора'"
                                             :selectedLabel="'Выбранный'"
                                             :deselectLabel="'Нажмите Enter, чтобы удалить'"

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
                                             :selectedLabel="'Выбранный'"
                                             :deselectLabel="'Нажмите Enter, чтобы удалить'"

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


                <div class="m-b-lg" v-for="tender in tender.data">
                    <div class="row m-b">
                        <div class="col-md-2">
                            <div class="thumb-lg">
                                <router-link :to="{ name: 'tender.show', params: { id: tender.id }}">
                                    <img v-bind:src="tender.author.avatar" v-bind:alt="tender.author.name" class="img-responsive">
                                </router-link>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h3 class="m-t-xs">
                                <router-link :to="{ name: 'tender.show', params: { id: tender.id }}">
                                    {{tender.content.ru.title}}
                                </router-link>
                            </h3>

                            <div class="tags">
                                <span  title="Используется данный тег" class="label text-black" v-for="tag in tender.tags">{{tag.name}}</span>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <p class="small wrapper">
                                {{tender.content.ru.description}}
                            </p>
                        </div>

                        <div class="col-md-12">
                            <div class="padder-v text-xs">
                                <span class="m-r-md"><i class="icon-clock"></i> {{tender.publish_at | moment("from", "now")}}</span>
                                <span class="m-r-md"><i class="icon-map"></i> {{tender.content.ru.city.name}}</span>

                                <span class="m-r-md" v-show="tender.content.ru.price != null"><i class="fa fa-rub"></i> {{tender.content.ru.price}}</span>
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


                <div class="jumbotron text-center bg-white not-found" v-if="tender.data.length === 0">

                    <p class="h3 m-b-xl inline b b-dark rounded wrapper-lg">
                        <i class="fa-3x w-1x icon-briefcase"></i>
                    </p>

                    <h4 class="m-t-none">Тендер не найден</h4>

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
        components: {Multiselect},
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
                tender: {
                    current_page:  null,
                    data: [],
                    from:  null,
                    next_page_url:null,
                    path:  null,
                    per_page: null,
                    prev_page_url: null,
                    to: null,
                },
                status: {
                    load: false,
                    submit: false,
                    self: false,
                    paginate: false,
                },
            }
        },
        beforeMount() {

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
                newId.forEach(function (item, i, arr) {
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

                axios.post(`/tender`, this.query)
                    .then(response => {
                        this.tender = response.data;
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

                if (this.tender.next_page_url !== null) {
                    this.status.submit = true;

                    axios.post(this.tender.next_page_url, this.query)
                        .then(response => {

                            let oldData = this.tender.data;
                            oldData = oldData.concat(response.data.data);

                            this.tender = response.data;
                            this.tender.data = oldData;

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
                this.isLoading = true;

                axios.get(`/tender/tags/` + query)
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
        },
    }
</script>
