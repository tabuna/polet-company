<template>

    <div class="bg-white b box-shadow">
        <div class="wrapper-md">

    <div class="">
        <div id="filters" class="b-b m-b-xl">
            <div class="row m-b-xs">
                <div class="col-md-12">

                    <strong>Найдено 666 предложений</strong>

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
                                     :deselectLabel ="'Нажмите Enter, чтобы удалить'"

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
                                     :selectLabel="'Нажмите Enter для выбора'"
                                     :selectedLabel="'Выбранный'"
                                     :deselectLabel ="'Нажмите Enter, чтобы удалить'"

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


        <div class="m-b-lg">
            <div class="row m-b">
                <div class="col-md-2">
                    <div class="thumb-lg">
                        <img src="/img/avatar.png" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-8">
                    <h3 class="m-t-xs"><a href="#">Разработка веб-сайта Нижний парк </a></h3>

                    <div class="tags">
                        <a href="" class="label">Разработка</a>
                        <a href="" class="label">Интернет</a>
                        <a href="" class="label">Веб-сайт</a>
                        <a href="" class="label">Сайт</a>
                        <a href="" class="label">Веб-студия</a>
                        <a href="" class="label">Интеграция</a>
                    </div>

                </div>
                <div class="col-md-2">
                    <p class="text-right text-xs">09 июня 2017</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <p>
                        Товарищи! реализация намеченных плановых заданий требуют определения и уточнения существенных финансовых и административных условий.
                    </p>

                    <div class="b-b padder-v text-xs">
                            <span class="m-r-md">
                                <i class="icon-clock"></i> 5 минут назад
                            </span>

                        <span class="m-r-md">
                            <i class="icon-tag"></i> Аавто
                            </span>

                        <span class="m-r-md">
                                <i class="icon-map"></i> Липецк
                            </span>
                    </div>

                </div>

            </div>
        </div>
        <div class="m-b-lg">
            <div class="row m-b">
                <div class="col-md-2">
                    <div class="thumb-lg">
                        <img src="/img/avatar.png" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-8">
                    <h3 class="m-t-xs"><a href="#">Разработка веб-сайта Нижний парк </a></h3>

                    <div class="tags">
                        <a href="" class="label">Разработка</a>
                        <a href="" class="label">Интернет</a>
                        <a href="" class="label">Веб-сайт</a>
                        <a href="" class="label">Сайт</a>
                        <a href="" class="label">Веб-студия</a>
                        <a href="" class="label">Интеграция</a>
                    </div>

                </div>
                <div class="col-md-2">
                    <p class="text-right text-xs">09 июня 2017</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <p>
                        Товарищи! реализация намеченных плановых заданий требуют определения и уточнения существенных финансовых и административных условий.
                    </p>

                    <div class="b-b padder-v text-xs">
                            <span class="m-r-md">
                                <i class="icon-clock"></i> 5 минут назад
                            </span>

                        <span class="m-r-md">
                            <i class="icon-tag"></i> Аавто
                            </span>

                        <span class="m-r-md">
                                <i class="icon-map"></i> Липецк
                            </span>
                    </div>

                </div>

            </div>
        </div>
        <div class="m-b-lg">
            <div class="row m-b">
                <div class="col-md-2">
                    <div class="thumb-lg">
                        <img src="/img/avatar.png" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-8">
                    <h3 class="m-t-xs"><a href="#">Разработка веб-сайта Нижний парк </a></h3>

                    <div class="tags">
                        <a href="" class="label">Разработка</a>
                        <a href="" class="label">Интернет</a>
                        <a href="" class="label">Веб-сайт</a>
                        <a href="" class="label">Сайт</a>
                        <a href="" class="label">Веб-студия</a>
                        <a href="" class="label">Интеграция</a>
                    </div>

                </div>
                <div class="col-md-2">
                    <p class="text-right text-xs">09 июня 2017</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <p>
                        Товарищи! реализация намеченных плановых заданий требуют определения и уточнения существенных финансовых и административных условий.
                    </p>

                    <div class="b-b padder-v text-xs">
                            <span class="m-r-md">
                                <i class="icon-clock"></i> 5 минут назад
                            </span>

                        <span class="m-r-md">
                            <i class="icon-tag"></i> Аавто
                            </span>

                        <span class="m-r-md">
                                <i class="icon-map"></i> Липецк
                            </span>
                    </div>

                </div>

            </div>
        </div>
        <div class="m-b-lg">
            <div class="row m-b">
                <div class="col-md-2">
                    <div class="thumb-lg">
                        <img src="/img/avatar.png" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-8">
                    <h3 class="m-t-xs"><a href="#">Разработка веб-сайта Нижний парк </a></h3>

                    <div class="tags">
                        <a href="" class="label">Разработка</a>
                        <a href="" class="label">Интернет</a>
                        <a href="" class="label">Веб-сайт</a>
                        <a href="" class="label">Сайт</a>
                        <a href="" class="label">Веб-студия</a>
                        <a href="" class="label">Интеграция</a>
                    </div>

                </div>
                <div class="col-md-2">
                    <p class="text-right text-xs">09 июня 2017</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <p>
                        Товарищи! реализация намеченных плановых заданий требуют определения и уточнения существенных финансовых и административных условий.
                    </p>

                    <div class="b-b padder-v text-xs">
                            <span class="m-r-md">
                                <i class="icon-clock"></i> 5 минут назад
                            </span>

                        <span class="m-r-md">
                            <i class="icon-tag"></i> Аавто
                            </span>

                        <span class="m-r-md">
                                <i class="icon-map"></i> Липецк
                            </span>
                    </div>

                </div>

            </div>
        </div>
        <div class="m-b-lg">
            <div class="row m-b">
                <div class="col-md-2">
                    <div class="thumb-lg">
                        <img src="/img/avatar.png" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-8">
                    <h3 class="m-t-xs"><a href="#">Разработка веб-сайта Нижний парк </a></h3>

                    <div class="tags">
                        <a href="" class="label">Разработка</a>
                        <a href="" class="label">Интернет</a>
                        <a href="" class="label">Веб-сайт</a>
                        <a href="" class="label">Сайт</a>
                        <a href="" class="label">Веб-студия</a>
                        <a href="" class="label">Интеграция</a>
                    </div>

                </div>
                <div class="col-md-2">
                    <p class="text-right text-xs">09 июня 2017</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <p>
                        Товарищи! реализация намеченных плановых заданий требуют определения и уточнения существенных финансовых и административных условий.
                    </p>

                    <div class="b-b padder-v text-xs">
                            <span class="m-r-md">
                                <i class="icon-clock"></i> 5 минут назад
                            </span>

                        <span class="m-r-md">
                            <i class="icon-tag"></i> Аавто
                            </span>

                        <span class="m-r-md">
                                <i class="icon-map"></i> Липецк
                            </span>
                    </div>

                </div>

            </div>
        </div>




        <div class="jumbotron text-center bg-white not-found">

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
        components: { Multiselect },
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
