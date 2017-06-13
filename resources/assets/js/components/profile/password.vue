<template>


    <form class="form-horizontal" v-on:submit.prevent="submitProfile" method="POST">


        <!--
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Упс!</strong> Похоже некоторые проблемы с вашими данными.
            <ul class="wrapper-lg">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        -->
        <div class="alert alert-success" v-if="status.success">
            {{status.success}}
        </div>

        <div class="page-header">
            <h4>Пароль можно изменить в целях безопасности или сбросить, если вы его забыли. </h4>
        </div>

        <div class="form-group " v-bind:class="{ 'has-error' : errors.name }">
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
        }, methods: {

            submitProfile: function () {

                if (this.status.submit === false) {
                    this.status.submit = true;
                    this.errors = {};
                    console.log(this.errors);
                    this.status.success = null;
                    axios.put(`/profile/password`, this.user)
                        .then(response => {
                            //this.user = response.data;
                            this.status.submit = false;
                        })
                        .catch(error => {
                            console.log(error);
                            this.errors = error.response.data;
                            this.status.submit = false;
                        });


                }


            }
        }
    }
</script>

