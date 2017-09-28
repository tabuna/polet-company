<template>


    <div class="bg-white b box-shadow" v-show="status.load">
        <div class="wrapper-md">
            <div v-if="threads.data.length !== 0">
                <div class="m-b-sm text-md">Отображение всех разговоров</div>
                <div class="list-group list-group-lg list-group-sp">

                    <div v-for="thread in threads.data">
                    <router-link
                            :to="{ name: 'message', params: { id: thread.id }}"
                                 class="list-group-item clearfix"
                                 v-bind:title="getAuthor(thread.users).name">
                      <span class="pull-left thumb-sm avatar m-r">
                        <img v-bind:src="getAuthor(thread.users).avatar" v-bind:alt="getAuthor(thread.users).name">
                      </span>
                        <span class="clear">
                    <span>{{ getAuthor(thread.users).agent_name }}</span>
                    <small class="clear text-ellipsis" v-if="thread.messages[0]"
                           v-bind:class="{ 'text-muted': !thread.isUnread, 'text-black': thread.isUnread }">
                        {{thread.messages[0].body}}
                    </small>
              </span>
                    </router-link>
                    </div>

                </div>
                <div v-infinite-scroll="loadNextPage()" infinite-scroll-disabled="status.submit"
                     infinite-scroll-distance="10">
                    <div class="m-b-lg" v-if="status.submit">
                        <div class="row m-b">
                            <div class="col-xs-12 text-center">
                                <i class='fa fa-2x fa-spinner fa-spin'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="jumbotron text-center bg-white not-found" v-if="threads.data.length === 0">

                <p class="h3 m-b-xl inline b b-dark rounded wrapper-lg">
                    <i class="fa-3x w-1x icon-bubbles"></i>
                </p>

                <h4 class="m-t-none">Список диалогов пуст</h4>

                <p class="text-muted m-t-lg">
                    Начните диалог с какой либо компанией и он будет отображатся тут
                </p>

            </div>


        </div>

    </div>
</template>


<script>
    export default {
        data: function () {
            return {
                threads: {
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
                mytime: "",
            }
        },
        mounted() {
            this.load()
        },
        methods: {
            load: function () {
                $('#adb').show();
                this.mytime = new Date().getTimezoneOffset();//Возвращает разницу между местным и UTC-временем, в минутах.
                let id = meta_user;

                axios.post(`/api/messages`)
                    .then(response => {
                        this.threads = response.data;
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
            getAuthor: function (users) {
                let author = '';
                users.forEach(function (item) {
                    if (meta_user !== item.pivot.user_id) {
                        author = item;
                    }
                });
                return author;
            },
            loadNextPage: function () {

                if (this.threads.next_page_url !== null) {

                    this.status.submit = true;

                    axios.post(this.threads.next_page_url)
                        .then(response => {

                            let oldData = this.threads.data;
                            oldData = oldData.concat(response.data.data);

                            this.threads = response.data;
                            this.threads.data = oldData;

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
