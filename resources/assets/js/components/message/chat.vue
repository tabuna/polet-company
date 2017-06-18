<template>


    <div class="bg-white b box-shadow" v-show="status.load">
        <div class="wrapper-md">

                <div class="panel-heading">Chat</div>
                <div class="panel-body">
                    <div class="m-b">
                        <a href="" class="pull-left thumb-sm avatar"><img src="http://flatfull.com/themes/angulr/angular/img/a2.jpg" alt="..."></a>
                        <div class="m-l-xxl">
                            <div class="pos-rlt wrapper b b-light r r-2x">
                                <span class="arrow left pull-up"></span>
                                <p class="m-b-none">Hi John, What's up...</p>
                            </div>
                            <small class="text-muted"><i class="fa fa-ok text-success"></i> 2 minutes ago</small>
                        </div>
                    </div>
                    <div class="m-b">
                        <a href="" class="pull-right thumb-sm avatar"><img src="http://flatfull.com/themes/angulr/angular/img/a3.jpg" class="img-circle"
                                                                           alt="..."></a>
                        <div class="m-r-xxl">
                            <div class="pos-rlt wrapper bg-primary r r-2x">
                                <span class="arrow right pull-up arrow-primary"></span>
                                <p class="m-b-none">Lorem ipsum dolor sit amet, conse <br>adipiscing eli...<br>:)</p>
                            </div>
                            <small class="text-muted">1 minutes ago</small>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <!-- chat form -->
                    <div>
                        <a class="pull-left thumb-xs avatar"><img src="img/a3.jpg" class="img-circle" alt="..."></a>
                        <form class="m-b-none m-l-xl ng-pristine ng-valid">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Say something">
                                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">SEND</button>
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
            }
        },
        mounted() {
            this.load()
        },
        methods: {
            load: function () {
                let id = meta_user;

                axios.post(`/messages`)
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
