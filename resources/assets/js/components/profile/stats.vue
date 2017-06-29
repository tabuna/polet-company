<template>


    <div class="bg-white b box-shadow">
        <div class="wrapper-md">

            <div class="jumbotron text-center bg-white not-found">

                <p class="h3 m-b-xl inline b b-dark rounded wrapper-lg">
                    <i class="fa-3x w-1x icon-graph"></i>
                </p>

                <h4 class="m-t-none">Недостаточно данных для статистики</h4>

                <p class="text-muted m-t-lg">

                    Сюда добавляются и отсюда оплачиваются заказы на размещение, поднятие и выделение объявлений, а также заказы на приобретение доступа к базе компаний.
                </p>



            </div>

        </div>
    </div>

</template>


<script>
    export default {
        props: ['id'],
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
            axios.post(`/profile/` + this.$route.params.id)
                .then(response => {
                    this.user = response.data
                })
                .catch(e => {
                    this.errors.push(e)
                });
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
