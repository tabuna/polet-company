<template>


    <div class="bg-white b box-shadow" v-show="status.load">
        <div class="wrapper-md">

            <div class="panel-heading">Чат</div>
            <div class="panel-body b" style="max-height: 1000px; overflow-y: scroll">


                <div v-if="threads.messages.next_page_url">
                    <p class="text-center">
                        <button class="btn btn-link" v-on:click="loadNextPage">Показать более ранние записи</button>
                    </p>
                </div>


                <div v-for="message in threads.messages.data">
                    <div class="m-b" v-if="message.user_id == currentUser">
                        <router-link :to="{ name: 'profile', params: { id: message.user_id }}" class="pull-left thumb-sm avatar"><img
                                :src="getAuthor(message.user_id).avatar" :alt="getAuthor(message.user_id).name">
                        </router-link>
                        <div class="m-l-xxl">
                            <div class="pos-rlt wrapper b b-light r r-2x">
                                <span class="arrow left pull-up"></span>
                                <p class="m-b-none">{{message.body}}</p>
                            </div>
                            <small class="text-muted"><i class="fa fa-ok text-success"></i>
                                {{message.created_at | moment("from", true) }} назад
                            </small>
                        </div>
                    </div>
                    <div class="m-b" v-else>
                        <router-link :to="{ name: 'profile', params: { id: message.user_id }}" class="pull-right thumb-sm avatar"><img
                                :src="getAuthor(message.user_id).avatar" :alt="getAuthor(message.user_id).name">
                        </router-link>
                        <div class="m-r-xxl">
                            <div class="pos-rlt wrapper b b-light r r-2x">
                                <span class="arrow right pull-up"></span>
                                <p class="m-b-none">{{message.body}}</p>
                            </div>
                            <small class="text-muted"> {{message.created_at | moment("from", true) }} назад</small>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="panel-footer b">
                <!-- chat form -->
                <div>
                    <a class="pull-left thumb-xs avatar"><img src="img/a3.jpg" class="img-circle" alt="..."></a>
                    <form class="m-b-none m-l-xl ng-pristine ng-valid" v-on:submit.prevent="sendMessage">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Написать сообщение"
                                   v-model="newMessage" v-on:keyup.enter="sendMessage">
                            <span class="input-group-btn">
                  <button class="btn btn-default" type="button" v-on:click="sendMessage">Отправить</button>
                </span>
                        </div>
                    </form>
                </div>
            </footer>

        </div>
    </div>
</template>


<script>
    export default {
        props: ['id'],
        data: function () {
            return {
                page : 1,
                currentUser: 0,
                newMessage: '',
                threads: {
                    messages: {
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
                    users: []
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
                let id = window.meta_user;
                this.currentUser= window.meta_user;

                axios.post(`/messages/` + this.$route.params.id)
                    .then(response => {
                        this.threads = response.data;
                        this.status.load = true;
                        this.threads.messages.data.reverse();
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
            getAuthor: function (user_id) {
                let author = '';
                this.threads.users.forEach(function (item) {
                    if (user_id === item.pivot.user_id) {
                        author = item;
                    }
                });
                return author;
            },
            loadNextPage: function () {

                if (this.threads.messages.next_page_url !== null) {
                    this.status.submit = true;

                    axios.post(this.threads.messages.next_page_url)
                        .then(response => {

                            let oldData = this.threads.messages.data;

                            response.data.messages.data.reverse();
                            oldData = response.data.messages.data.concat(oldData);

                            this.threads.messages = response.data.messages;
                            this.threads.messages.data = oldData;

                            this.status.submit = false;
                        })
                        .catch(e => {
                            this.errors.push(e)
                        });
                }
            },
            sendMessage: function () {

                var message = this.newMessage.trim();
                if (message) {

                    axios.put(`/messages/` + this.$route.params.id, {
                        'message': message
                    })
                        .then(response => {
                            this.threads = response.data;
                        })
                        .catch(e => {
                            this.errors.push(e)
                        });
                }

            }
        }
    }
</script>
