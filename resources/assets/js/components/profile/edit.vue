<template>

    <div class="bg-white b box-shadow" v-if="status.load">
        <div class="wrapper-md">

            <form class="form-horizontal" method="POST"
                  enctype="multipart/form-data" v-on:submit.prevent="submitProfile">

                <div class="row">
                    <div class="col-sm-9">
                        <div class="v-center">
                            <div class="fileinput fileinput-exists thumb-lg pull-left m-r-md" data-provides="fileinput"
                                 data-toggle="tooltip" data-placement="bottom" title="Логотип компании. Формат: jpg, gif, png. Максимальный размер файла: 2Mb. Рекомендованный размер 200х200px."

                            >

                                <div class="btn-file">
                                    <div class="user-avatar fileinput-preview  thumb-lg pull-left m-r-md">
                                        <img v-bind:src="user.avatar"
                                             alt="Нажмите, что бы изменить изображение"
                                             class="">
                                    </div>

                                    <input type="file" size="2MB" accept="image/jpeg,image/png,image/gif"
                                           @change="onAvatarChange">
                                </div>

                            </div>


                            <div class="clear m-b">
                                <div class="m-b m-t-sm">
                                    <span class="h3 text-info m-t-xs">{{user.name}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" v-bind:class="{ 'has-error' : errors.name }">
                    <label class="col-sm-3 control-label">Название компании</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control form-control-grey"
                               v-model="user.name"
                               placeholder="Имя организации" maxlength="80">
                        <p class="help-block" v-if="errors.name">
                            {{ errors.name }}
                        </p>
                        <p class="help-block" v-else="errors.name">
                            Укажите, как будет отображаться название компании для пользователей сервиса.
                        </p>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group" v-bind:class="{ 'has-error' : errors.agent_name }">
                    <label class="col-sm-3 control-label">Имя представителя компании</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control form-control-grey"
                               v-model="user.agent_name"
                               placeholder="Ваше полное имя" maxlength="80">
                        <p class="help-block" v-if="errors.agent_name">
                            {{ errors.agent_name }}
                        </p>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group" v-bind:class="{ 'has-error' : errors.inn }">
                    <label class="col-sm-3 control-label">ИНН:</label>
                    <div class="col-sm-9">
                        <input type="number" name="inn" class="form-control form-control-grey"
                               v-model="user.inn"
                               placeholder="ИНН" maxlength="12">
                        <p class="help-block" v-if="errors.inn">
                            {{ errors.inn }}
                        </p>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group" v-bind:class="{ 'has-error' : errors.orgn }">
                    <label class="col-sm-3 control-label">ОГРН:</label>
                    <div class="col-sm-9">
                        <input type="number" name="ogrn" class="form-control form-control-grey"
                               v-model="user.ogrn"
                               placeholder="ОГРН"
                               maxlength="15">
                        <p class="help-block" v-if="errors.orgn">
                            {{ errors.orgn }}
                        </p>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group" v-bind:class="{ 'has-error' : errors.phone }">
                    <label class="col-sm-3 control-label">Телефон</label>
                    <div class="col-sm-9">
                        <input type="tel" name="phone" class="form-control form-control-grey"
                               data-mask="+ 9-999-999-99-99"
                               v-model="user.phone"
                               placeholder="Номер телефона">
                        <p class="help-block" v-if="errors.phone">
                            {{ errors.phone }}
                        </p>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group" v-bind:class="{ 'has-error' : errors.email }">
                    <label class="col-sm-3 control-label">Электронная почта</label>
                    <div class="col-sm-9">
                        <input type="email" readonly name="email" class="form-control form-control-grey"
                               v-model="user.email"
                               placeholder="Электронная почта" maxlength="120">
                        <p class="help-block" v-if="errors.email">
                            {{ errors.email }}
                        </p>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group" v-bind:class="{ 'has-error' : errors.website }">
                    <label class="col-sm-3 control-label">Веб-сайт</label>
                    <div class="col-sm-9">
                        <input type="url" name="website" class="form-control form-control-grey"
                               v-model="user.website"
                               placeholder="Веб-сайт компании" maxlength="120">
                        <p class="help-block" v-if="errors.website">
                            {{ errors.website }}
                        </p>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group" v-bind:class="{ 'has-error' : errors.about }">
                    <label class="col-sm-3 control-label">О Компании</label>
                    <div class="col-sm-9">
                    <textarea class="form-control form-control-grey no-resize" rows="14" name="about"
                              v-model="user.about"
                              placeholder="Небольшой рассказ о себе"></textarea>
                        <p class="help-block" v-if="errors.about">
                            {{ errors.about }}
                        </p>
                        <p class="help-block" v-else="errors.name">
                            Чем больше информации о компании — тем легче соискателям составить первое
                            впечатление и принять решение об отклике на вакансию.
                        </p>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group" v-bind:class="{ 'has-error' : errors.address }">
                    <label class="col-sm-3 control-label">Адрес</label>
                    <div class="col-sm-9">
                        <input class="form-control form-control-grey no-resize" name="address"
                               v-model="user.address"
                               placeholder="Адрес">
                        <p class="help-block" v-if="errors.address">
                            {{ errors.address }}
                        </p>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group" v-bind:class="{ 'has-error' : errors.address }">
                    <label class="col-sm-3 control-label">Теги компании</label>
                    <div class="col-sm-9">
                        <select class="form-control" v-model="user.tags" v-selectcompanytag="user.tags"
                                multiple="multiple">
                            <option v-for="tag in user.tags" :value="tag.name">{{ tag.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
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

        </div>
    </div>

</template>


<script>
    export default {
        data: function () {
            return {
                user: {
                    name: '',
                    agent_name: '',
                    email: '',
                    phone: '',
                    address: '',
                    inn: '',
                    ogrn: '',
                    website: '',
                    about: '',
                    avatar: '',
                    tags: '',
                    newAvatar: '',
                },
                status: {
                    load: false,
                    submit: false,
                    self: false,
                },
                errors: {},

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

        },
        methods: {
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
                    vm.user.newAvatar = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            submitProfile: function () {

                if (this.status.submit === false) {
                    this.status.submit = true;
                    this.errors = {};

                    axios.put(`/profile/edit`, this.user)
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
