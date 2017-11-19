<template>

    <div class="bg-white b box-shadow">
        <div class="wrapper-md">
    <form class="form-horizontal" v-on:submit.prevent="submitProfile" method="POST">

        <div class="page-header">
            <h5>Пароль можно изменить в целях безопасности или сбросить, если вы его забыли. </h5>
        </div>

        <div class="form-group " v-bind:class="{ 'has-error' : errors.password }">
            <label class="col-sm-3 control-label">Новый пароль</label>
            <div class="col-sm-9">
                <input type="password" name="password" class="form-control form-control-grey" placeholder="******"
                       v-model="user.password"
                >
                <p class="help-block" v-if="errors.password">
                    {{ errors.password }}
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Повторите пароль</label>
            <div class="col-sm-9">
                <input type="password" name="password_confirmation" v-model="user.password_confirmation"
                       class="form-control  form-control-grey"
                       placeholder="******">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9 text-right">
                <button type="submit" class="btn btn-info btn-rounded">
                    <span v-if="status.submit">Отправка <i class='fa fa-spinner fa-spin'></i></span>
                    <span v-else="status.submit">Сохранить</span>
                </button>
            </div>
        </div>

    </form>

        </div>
    </div>

</template>


<script>
    export default {
        data: function () {
            return {
                user: {
                    password: '',
                    password_confirmation: '',

                },
                status: {
                    load: false,
                    submit: false,
                    self: false,
                    success: "",
                },

                errors: {},
            }
        },
        mounted() {
            this.load();
        },
        methods: {
            load: function () {
                $('#adb').show();
            },
            submitProfile: function () {

                if (this.status.submit === false) {
                    this.status.submit = true;
                    this.errors = {};
                    console.log(this.errors);
                    this.status.success = null;
                    axios.put(`/api/profile/password`, this.user)
                        .then(response => {
                            //this.user = response.data;
                            this.status.submit = false;
                            swal({
                                title: 'Успешно!',
                                type: 'success',
                                text: 'Данные были обновлены',
                                timer: 2500,
                                showConfirmButton: false,
                            }).catch(swal.noop)
                        })
                        .catch(error => {
                            this.errors = error.response.data;
                            this.status.submit = false;
                            swal({
                                title: 'Ошибка!',
                                type: 'error',
                                text: 'Проверьте вводимые данные',
                                timer: 2500,
                                showConfirmButton: false,
                            }).catch(swal.noop)
                        });


                }


            }
        }
    }
</script>

