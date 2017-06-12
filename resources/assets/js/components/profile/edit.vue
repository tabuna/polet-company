<template>

    <form class="form-horizontal" method="POST"
          enctype="multipart/form-data" v-on:submit.prevent="submitProfile" v-if="status.load">

        <div class="row">
            <div class="col-sm-9">
                <div class="v-center">
                    <div class="fileinput fileinput-exists thumb-lg pull-left m-r-md" data-provides="fileinput">

                        <div class="btn-file">
                            <div class="user-avatar fileinput-preview  thumb-lg pull-left m-r-md">
                                <img v-bind:src="user.avatar"
                                     alt="Нажмите, что бы изменить изображение"
                                     class="">
                            </div>

                            <input type="file" accept="image/jpeg,image/png,image/gif" name="avatar"
                                   @change="onAvatarChange">
                        </div>

                    </div>


                    <div class="clear m-b">
                        <div class="m-b m-t-sm">
                            <span class="h3 text-black">{{user.name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group" v-bind:class="{ 'has-error' : errors.name }">
            <label class="col-sm-3 control-label">Полное имя</label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control form-control-grey"
                       v-model="user.name"
                       placeholder="Ваше полное имя" maxlength="80">
                <p class="help-block" v-if="errors.name">
                    {{ errors.name }}
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">ИНН:</label>
            <div class="col-sm-9">
                <input type="number" name="inn" class="form-control form-control-grey"
                       v-model="user.inn"
                       placeholder="ИНН" maxlength="12">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">ОГРН:</label>
            <div class="col-sm-9">
                <input type="number" name="ogrn" class="form-control form-control-grey"
                       placeholder="ОГРН" maxlength="15">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Телефон</label>
            <div class="col-sm-9">
                <input type="tel" name="phone" class="form-control form-control-grey"
                       data-mask="+ 9-999-999-99-99"
                       v-model="user.phone"
                       placeholder="Номер телефона">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Электронная почта</label>
            <div class="col-sm-9">
                <input type="email" readonly name="email" class="form-control form-control-grey"
                       v-model="user.email"
                       placeholder="Электронная почта" maxlength="120">
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-3 control-label">Веб-сайт</label>
            <div class="col-sm-9">
                <input type="url" name="website" class="form-control form-control-grey"
                       v-model="user.website"
                       placeholder="Веб-сайт компании" maxlength="120">
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-3 control-label">О Компании</label>
            <div class="col-sm-9">
                    <textarea class="form-control form-control-grey no-resize" rows="14" name="about"
                              v-model="user.about"
                              placeholder="Небольшой рассказ о себе"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Адрес</label>
            <div class="col-sm-9">
                <input class="form-control form-control-grey no-resize" name="address"
                       v-model="user.address"
                       placeholder="Адрес">
            </div>
        </div>



        <div class="form-group">
            <label class="col-sm-3 control-label">Теги компании</label>
            <div class="col-sm-9">
                <input class="form-control form-control-grey no-resize" name="tags" data-role="tagsinput"
                       v-model="user.address"
                       placeholder="Ключевые слова компании">
            </div>
        </div>


        <div class="form-group m-t-md">
            <div class="col-sm-3 col-sm-offset-3">
                <a href="#profile.password" class="btn btn-link">Изменить пароль?</a>
            </div>
            <div class="col-sm-6 text-right">
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
                    name: '',
                    email: '',
                    phone: '',
                    address: '',
                    inn: '',
                    ogrn: '',
                    website: '',
                    about: '',
                    avatar: '',
                    notification: '',
                    agent_name: '',
                },
                status: {
                    load: false,
                    submit: false,
                    self: false,
                },
                errors:{

                },
            }
        },
        mounted() {
            moduleLoad();

            axios.post(`/profile/edit`)
                .then(response => {
                    this.user = response.data;
                    this.status.load = true;
                })
                .catch(e => {
                    this.errors.push(e)
                });
        }, methods: {
            onAvatarChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let image = new Image();
                let reader = new FileReader();
                let vm = this;

                reader.onload = (e) => {
                    vm.user.avatar = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            submitProfile: function () {

                if(this.status.submit === false) {
                    this.status.submit = true;

                axios.put(`/profile/edit`, this.user)
                    .then(response => {
                        this.user = response.data;
                        this.status.submit = false;
                    })
                    .catch(e => {
                        console.log(e);
                        this.errors = e;
                        this.status.submit = false;
                    });
                }
            }
        }
    }
</script>
