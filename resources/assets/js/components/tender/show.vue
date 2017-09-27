<template>

    <div  v-if="status.load">
    <div class="bg-white b box-shadow">
        <div class="wrapper-md">

            <div class="" v-if="status.load">

                <div class="m-b-lg">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="thumb-lg">
                                <router-link :to="{ name: 'profile', params: { id: tender.author.id }}">
                                    <img v-bind:src="tender.author.avatar" v-bind:alt="tender.author.name" class="img-responsive thumbnail">
                                </router-link>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h3 class="m-t-xs">{{tender.content.ru.title}}</h3>

                            <div class="tags">
                                <span title="Используется данный тег" class="label text-dark" v-for="tag in tender.tags">{{tag.name}}</span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="small wrapper">
                                {{tender.content.ru.description}}
                            </p>
                        </div>


                        <div class="col-md-12" v-if="tender.attachment.length !== 0">
                            <div class="wrapper">
                            <p class="h5 font-thin  m-b-lg">Докуметы для загрузки:</p>
                            <ul>
                                <li v-for="attachment in tender.attachment">
                                    <a v-bind:href="generateUrl(attachment)">
                                       {{attachment.original_name}}
                                    </a>
                                </li>
                            </ul>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="wrapper">
                            <p class="h5 font-thin  m-b">Контакты:</p>
                                      <p class="text-muted">
                                          <span><i class="icon-user text-info m-r-xs"></i>| {{tender.content.ru.name}} <br></span>
                                          <span><i class="icon-phone text-info m-r-xs"></i>| {{tender.content.ru.phone}} <br></span>
                                          <span><i class="icon-envelope text-info m-r-xs"></i>| {{tender.content.ru.email}}<br></span>
                                      </p>
                            </div>
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


            </div>

        </div>
    </div>

    <div class="bg-white box-shadow wrapper-md">
        <p class="h3 font-thin m-t-md m-b"><i class="icon-bubbles m-r"></i> Комментарии</p>
        <hr>

        <div class="m-b-md" v-for="comment in tender.comments">
            <p class="pull-left thumb-sm">
                <img v-bind:src="comment.author.avatar" class="img-circle">
            </p>
            <div class="m-l-xxl m-b">
                <div>
                    <strong>{{comment.author.name}}</strong><small class="m-l-sm">{{comment.author.agent_name}}</small>
                    <span class="text-muted text-xs block">
                               {{comment.created_at | moment("from", "now")}}
                    </span>
                </div>
                <div class="m-t-sm">
                   {{comment.content}}
                </div>
            </div>
        </div>





        <div v-if="tender.comments.length === 0">
            <div class="alert alert-info text-center" role="alert">Пока нет комментариев</div>
        </div>

        <div id="comments">
            <div class="h4 m-t-xl m-b">Оставить комментарий</div>
            <hr>
            <form class="form" method="post" v-on:submit.prevent="sendMessage">
                <div class="form-group">
                    <textarea rows="6" v-model="content" maxlength="500" required class="form-control form-control-grey no-resize" placeholder="Комментарий" v-on:keyup.enter="sendMessage"></textarea>
                </div>
                <p class="text-right m-t-lg">
                    <button type="submit" class="btn btn-info btn-rounded" v-on:click="sendMessage">
                        <span v-if="status.submit">Отправка <i class='fa fa-spinner fa-spin'></i></span>
                        <span v-else="status.submit">Сохранить</span>
                    </button>
                </p>
            </form>
        </div>
    </div>
    </div>

</template>


<script>
    export default {
        props: ['id'],
        data: function () {
            return {
                tender: {},
                status: {
                    load: false,
                    submit: false,
                    self: false,
                },
                content: '',
            }
        },
        beforeMount() {
            this.loadData();
        },
        mounted() {
            this.load();
        },
        methods: {
            load: function () {
                $('#adb').show();
            },
            loadData:function () {
                axios.post(`/api/tender/` + this.$route.params.id)
                    .then(response => {
                        this.tender = response.data;
                        this.status.load = true;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    });
            },
            sendMessage: function () {
                if (this.status.submit === false) {
                    this.status.submit = true;
                    let content = this.content.trim();
                    if (content) {

                        axios.post(`/api/tender/comment/` + this.$route.params.id, {
                            'content': content
                        })
                            .then(response => {
                                this.loadData();
                                //this.tender = response.data;
                                this.content = '';
                                this.status.submit = false;
                            })
                            .catch(e => {
                                this.errors.push(e)
                            });
                    }

                }
            },
            generateUrl: function(file){
                return '/storage/'+ file.path + file.name + "." + file.extension;
            },
        }
    }
</script>
