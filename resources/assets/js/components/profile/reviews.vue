<template>
    <div class="bg-white  box-shadow" v-show="status.load">
        <div class="wrapper-md">

            <div class="padder-b">
                <div class="reviews">


                    <div class=" padder-v " v-if="!status.self">

                        <h4 class="l-h-1x">Оставьте свой отзыв</h4>
                        <div>

                            <router-link :to="{ name: 'profile', params: { id: currentUser }}"
                                         class="pull-left thumb-xs avatar">
                                <img :src="currentUserData.avatar" class="img-circle" :alt="currentUserData.name">
                            </router-link>
                            <form class="m-b-none m-l-xl ng-pristine ng-valid" v-on:submit.prevent="sendMessage">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Написать сообщение"
                                           v-model="review.review_text" v-on:keyup.enter="newReview">
                                    <span class="input-group-btn">
                                      <button class="btn btn-default" type="button" v-on:click="newReview">Отправить</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div >
                        <div >
                            <div v-if="reviews.data.length !== 0">
                                <h4 class="l-h-1x">Отзывы:</h4>

                                <div class="list-group list-group-lg list-group-sp">

                                    <div class="row m-b v-center" v-for="review in reviews.data">
                                        <div class="col-md-3">
                                            <router-link :to="{ name: 'profile', params: { id: review.author.id }}">
                                                <img :src="review.author.avatar" :alt="review.author.name"
                                                     class="img-responsive thumbnail">
                                            </router-link>
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="m-t-xs">
                                                <router-link :to="{ name: 'profile', params: { id: review.author.id }}">
                                                    {{review.author.name}}
                                                </router-link>
                                            </h4>
                                            <p class="small">
                                                {{review.text}}
                                            </p>
                                            <p class="text-xs text-right text-muted">
                                                {{ review.updated_at | moment("subtract", mytime + " minutes", "from", true)}}
                                            </p>
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
                            </div>


                            <div class="jumbotron text-center bg-white not-found" v-if="reviews.data.length === 0">

                                <p class="h3 m-b-xl inline b b-dark rounded wrapper-lg"><i
                                        class="fa-3x w-1x icon-bubbles"></i>
                                </p>

                                <h4 class="m-t-none">Список Отзывов пуст</h4>

                                <p class="text-muted m-t-lg">

                                </p>

                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
    export default {
        //props: ['id'],
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
                    id: '',

                },
                currentUserData: {
                    name: '',
                    email: '',
                    phone: '',
                    address: '',
                    inn: '',
                    ogrn: '',
                    website: '',
                    about: '',
                    avatar: '',
                    id: '',
                },
                reviews: {
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
                mytime: "",
                review: {
                    review_text: '',
                },

                status: {
                    load: false,
                    submit: false,
                    self: false,
                },
                currentUser: ''
            }
        },
        mounted() {
            this.load(this.$route.params.id);

            this.status.self = false;
            if (this.$route.params.id === window.meta_user) {
                this.status.self = true;
            }
            //минутах.


        },
        watch: {
            '$route.params.id'(newId, oldId) {
                this.load(newId);

                this.status.self = false;
                if (newId === window.meta_user) {
                    this.status.self = true;
                }

            },
        },
        methods: {
            load: function (id) {
                $('#adb').show();

                this.mytime = new Date().getTimezoneOffset();//Возвращает разницу между местным и UTC-временем, в минутах.
                this.currentUser = window.meta_user;

                axios.post(`/api/profile/` + id)
                    .then(response => {
                        this.user = response.data;
                        this.status.load = true;
                    })
                    .catch(e => {
                        //this.errors.push(e)
                    });
                axios.post(`/api/profile/` + this.currentUser)
                    .then(response => {
                        //this.user = response.data;
                        //this.status.load = true;
                        this.currentUserData = response.data;
                    })
                    .catch(e => {
                        //this.errors.push(e)
                    });

                axios.post(`/api/profile/reviews/` + id, {})
                    .then(response => {
                        this.reviews = response.data;

                        this.status.submit = false;
                    })
                    .catch(e => {
                        // this.errors.push(e)

                    });

            },

            newReview: function () {
                this.status.submit = true;

                axios.post(`/api/profile/reviews/store/` + this.user.id, {
                    text: this.review.review_text,
                })
                    .then(response => {

                        //this.$router.push({ name: 'review', params: { id: response.data.id }})
                        axios.post(`/api/profile/reviews/` + this.user.id, {})
                            .then(response => {
                                this.reviews = response.data;
                            })
                            .catch(e => {
                                // this.errors.push(e)

                            });
                        this.status.submit = false;
                    })
                    .catch(e => {
                        // this.errors.push(e)

                    });


            },
            loadNextPage: function () {

                if (this.reviews.next_page_url !== null) {
                    this.status.submit = true;

                    axios.post(this.reviews.next_page_url)
                        .then(response => {

                            let oldData = this.reviews.data;


                            oldData = oldData.concat(response.data.data);


                            this.reviews = response.data;
                            this.reviews.data = oldData;

                            this.status.submit = false;
                            //const container = document.querySelector('.messages');
                            // Ps.update(container);
                        })
                        .catch(e => {
                            // this.errors.push(e)
                        });
                }
            },


        }
    }
</script>
