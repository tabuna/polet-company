<template>

    <div v-show="status.load">


        <div class="m-b-lg" v-for="fave in favorites.data">
            <div class="row m-b">
                <div class="col-md-2">
                    <div class="thumb-lg">
                        <router-link :to="{ name: 'profile', params: { id: fave.id }}">
                        <img v-bind:src="fave.avatar" v-bind:alt="fave.name" class="img-responsive">
                        </router-link>
                    </div>
                </div>
                <div class="col-md-10">
                    <h3 class="m-t-xs">
                        <router-link :to="{ name: 'profile', params: { id: fave.id }}">
                            {{fave.name}}
                        </router-link>
                    </h3>

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

        <div class="jumbotron text-center bg-white not-found" v-if="favorites.data.length === 0">
            <div>
                <h3 class="font-thin">Добавьте компанию в избранное и она будет отображаться тут</h3>
            </div>
        </div>



    </div>

</template>


<script>
    export default {
        data: function () {
            return {
                favorites: {
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

                axios.post(`/profile/fave`)
                    .then(response => {
                        this.favorites = response.data;
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
            fave: function () {
                if (!this.status.submit) {
                    this.status.submit = true;
                    axios.put(`/profile/fave/` + this.$route.params.id);
                    this.user.fave = !this.user.fave;
                    this.status.submit = false;
                }
            }
        }
    }
</script>
