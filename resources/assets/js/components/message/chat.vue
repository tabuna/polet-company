<template>


    <div class="bg-white b box-shadow" v-show="status.load">
        <div class="wrapper-md">

            <div class="panel-heading">
                <strong>Чат</strong>
            </div>
            <div class="panel-body b scrollBlock">

                <div class="messages" style="position: relative;
    height: 500px;padding-right: 15px; padding-bottom: 30px;">
                <div v-if="threads.messages.next_page_url">
                    <p class="text-center">
                        <button class="btn btn-link" v-on:click="loadNextPage">Показать более ранние записи</button>
                    </p>
                </div>


                <div v-for="message in threads.messages.data" class="">
                    <div class="m-b" v-if="message.user_id == currentUser">
                        <router-link :to="{ name: 'profile', params: { id: message.user_id }}" class="pull-left thumb-sm avatar"><img
                                :src="getAuthor(message.user_id).avatar" :alt="getAuthor(message.user_id).name">
                        </router-link>
                        <div class="m-l-xxl">
                            <div class="pos-rlt wrapper b b-light r r-2x">
                                <span class="arrow left pull-up"></span>

                                <p class="m-b-none">
                                    <a :href="message.type" v-if="message.type !== 'message'"  target="_blank">
                                        <i class="icon-cloud-download m-r-xs"></i> {{message.body}}
                                    </a>

                                    <span v-if="message.type === 'message'">
                                         {{message.body}}
                                    </span>
                                </p>

                            </div>
                            <small class="text-muted"><i class="fa fa-ok text-success"></i>
                                {{message.created_at | moment("subtract", mytime+" minutes", "from", true) }} назад
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
                                <p class="m-b-none">
                                           <a :href="message.type" v-if="message.type !== 'message'" target="_blank">
                                        <i class="icon-cloud-download m-r-xs"></i> {{message.body}}
                                    </a>

                                    <span v-if="message.type === 'message'">
                                         {{message.body}}
                                    </span>
                                </p>
                            </div>
                            <small class="text-muted"> {{message.created_at | moment("subtract", mytime+" minutes","from",  "now") }} </small>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <footer class="panel-footer b">
                <!-- chat form -->
                <div>
                    <router-link :to="{ name: 'profile', params: { id: currentUser }}" class="pull-left thumb-xs avatar">
                        <img :src="getAuthor(currentUser).avatar" class="img-circle" :alt="getAuthor(currentUser).name" style="min-height: 25px;">
                    </router-link>
                    <form class="m-b-none m-l-xl ng-pristine ng-valid" v-on:submit.prevent="sendMessage">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Написать сообщение"
                                   v-model="newMessage" v-on:keyup.enter="sendMessage">
                            <span class="input-group-btn">



                  <button class="btn btn-default" type="button"  onclick="document.getElementById('upload').click()">
                      <i class="icon-folder-alt" aria-hidden="true"></i>
                      <input type="file" @change="uploadFile" id="upload" style="display:none">
                  </button>
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
                fileUploadFormData: new FormData(),
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
                mytime: "",
            }
        },
        mounted() {
            this.load();
        },
        methods: {
            load: function () {
                $('#adb').hide();
                this.mytime = new Date().getTimezoneOffset();//Возвращает разницу между местным и UTC-временем, в минутах.
                $('.scrollBlock').height($('#rightPanel').height()-192);

                const container = document.querySelector('.messages');
                Ps.initialize(container, {
                    wheelSpeed: 2,
                    wheelPropagation: true,
                    minScrollbarLength: 20
                });


                let id = window.meta_user;
                this.currentUser= window.meta_user;

                axios.post(`/api/messages/` + this.$route.params.id)
                    .then(response => {
                        this.threads = response.data;
                        this.status.load = true;
                        this.threads.messages.data.reverse();

                        setTimeout(function () {
                            //container.scrollIntoView({block: "end"});
                            //$('.messages').scrollTop($('.messages').height());
                            container.scrollTop =Math.ceil(container.scrollHeight - container.clientHeight);
                            Ps.update(container);
                        }, 1000);

                    })
                    .catch(e => {
                        this.errors.push(e)
                    });

                this.status.self = false;

                if (id !== window.meta_user) {
                    this.status.self = true;
                }

                //container.scrollIntoView({block: "end"});
                //$('.messages').scrollTop($('.messages').height());
                container.scrollTop =Math.ceil(container.scrollHeight - container.clientHeight);
            },
            getAuthor: function (user_id) {
                let author = '';
                this.threads.users.forEach(function (item) {
                    if ( +user_id === item.pivot.user_id) {
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
                            const container = document.querySelector('.messages');
                            Ps.update(container);
                        })
                        .catch(e => {
                            this.errors.push(e)
                        });
                }
            },
            sendMessage: function () {

                var message = this.newMessage.trim();
                if (message) {

                    axios.put(`/api/messages/` + this.$route.params.id, {
                        'message': message
                    })
                        .then(response => {
                            response.data.messages.data.reverse();
                            this.threads = response.data;
                            this.newMessage= '';
                        })
                        .catch(e => {
                            this.errors.push(e)
                        });
                    const container = document.querySelector('.messages');
                    Ps.update(container);
                    container.scrollTop =Math.ceil(container.scrollHeight - container.clientHeight);
                }

            },
            uploadFile: function (e) {
                e.preventDefault();

                if(e.target.files[0] === undefined){
                    return;
                }


                let fileSize = file.files[0].size / 1024 / 1024;
                if (FileSize > 2) {
                    swal({
                        title: 'Файл слишком большой!',
                        type: 'warning',
                        text: 'Пожалуйста используйте облачные хранилища для передачи больших файлов',
                        timer: 2500,
                        showConfirmButton: false,
                    }).catch(swal.noop);

                    e.target.files[0] = "";
                };


                var formData = new FormData();
                formData.append('file', e.target.files[0]);

                axios.post('/api/messages/upload/' + this.$route.params.id, formData)
                    .then(response => {
                        response.data.messages.data.reverse();
                        this.threads = response.data;
                        this.newMessage= '';
                    })
                    .catch(e => {
                        this.errors.push(e)
                    });

                const container = document.querySelector('.messages');
                Ps.update(container);
                container.scrollTop =Math.ceil(container.scrollHeight - container.clientHeight);

            } 
        }
    }
</script>
