<template>

    <div class="bg-white b box-shadow">
        <div class="wrapper-md">

            <div class="" v-show="status.load">
                <div id="filters" class="b-b m-b-xl">
                    <div class="row m-b-xs">
                        <div class="col-md-12">

                            <strong>Найдено 666 компаний</strong>

                            <button type="submit" id="button-filter" class="btn btn-default pull-right"><i
                                    class="fa fa-filter"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Поиск по названию</label>
                                <input type="text" name="search" value="" placeholder="Поиск записей.." class="form-control"
                                       maxlength="200" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Город</label>
                                <select name="status" class="form-control">
                                    <option></option>
                                    <option value="publish">Опубликовано</option>
                                    <option value="draft">Черновик</option>
                                    <option value="titz">Тиц</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Теги</label>
                                <select name="status" class="form-control">
                                    <option></option>
                                    <option value="publish">Опубликовано</option>
                                    <option value="draft">Черновик</option>
                                    <option value="titz">Тиц</option>
                                </select>
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
                                <a href="" class="label">Разработка</a>
                                <a href="" class="label">Интернет</a>
                                <a href="" class="label">Веб-сайт</a>
                                <a href="" class="label">Сайт</a>
                                <a href="" class="label">Веб-студия</a>
                                <a href="" class="label">Интеграция</a>
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
    export default {
        data: function () {
            return {
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
            this.load()
        },
        methods: {
            load: function () {
                let id = meta_user;

                axios.post(`/companies`)
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

                    axios.post(this.users.next_page_url)
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
        }
    }
</script>
