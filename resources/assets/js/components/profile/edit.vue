<template>

    <div class="user-edit">
        <div class="col-md-6">
    <div class="bg-white b box-shadow">
        <div class="wrapper-md">


            <form class="form-horizontal" method="POST"
                  enctype="multipart/form-data">

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

                                    <input type="file" name="avatar">
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


                <div class="form-group">
                    <label class="col-sm-3 control-label">Полное имя</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control form-control-grey"
                               v-model="user.name"
                               placeholder="Ваше полное имя" maxlength="120">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">ИНН:</label>
                    <div class="col-sm-9">
                        <input type="text" name="inn" class="form-control form-control-grey"
                               v-model="user.inn"
                               placeholder="ИНН" maxlength="12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">ОГРН:</label>
                    <div class="col-sm-9">
                        <input type="text" name="ogrn" class="form-control form-control-grey"
                               v-model="user.ogrn"
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
                        <input type="email" name="email" class="form-control form-control-grey"
                               v-model="user.email"
                               placeholder="Электронная почта" maxlength="120">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Веб-сайт</label>
                    <div class="col-sm-9">
                        <input type="url" name="website" class="form-control form-control-grey"
                               v-model="user.website"
                               placeholder="Личный веб-сайт" maxlength="120">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">О Компании</label>
                    <div class="col-sm-9">
                    <textarea class="form-control form-control-grey no-resize" rows="8" name="about"
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
                    <div class="col-sm-offset-3 col-sm-9">
                        <label class="i-checks i-checks-sm">
                            <input type="radio" name="notification" value="1" v-model="user.notification">
                            <i></i>
                            Подписаться на уведомления
                        </label>

                        <label class="i-checks i-checks-sm">
                            <input type="radio" name="notification" value="0" v-model="user.notification">
                            <i></i>
                            Не присылать уведомления
                        </label>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-3">
                        <a href="#profile.password" class="btn btn-link">Изменить пароль?</a>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button type="submit" class="btn btn-lg btn-default btn-rounded btn-basic-blue">Сохранить</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
        </div>


        <div class="col-md-3">
            <div class="panel panel-default b box-shadow">
                <div class="panel-heading">
                    <div class="clearfix">
                        <div class="clear">
                            <div class="h4 m-t-xs m-b-xs">
                                Черняев Александр
                                <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i>
                            </div>
                            <small class="text-muted">Представитель компании</small>
                        </div>
                    </div>
                </div>
                <div class="list-group no-radius alt">
                    <a class="list-group-item" href="">
                        <i class="fa fa-comment fa-fw text-muted"></i>
                        Адрес компании
                    </a>
                    <a class="list-group-item" href="">
                        <i class="fa fa-envelope fa-fw text-muted"></i>
                        Спрос
                    </a>
                    <a class="list-group-item" href="">
                        <i class="fa fa-eye fa-fw text-muted"></i>
                        Проедложения
                    </a>
                    <a class="list-group-item" href="">
                        <i class="fa fa-comment fa-fw text-muted"></i>
                        Адрес компании
                    </a>
                    <a class="list-group-item" href="">
                        <i class="fa fa-envelope fa-fw text-muted"></i>
                        Спрос
                    </a>
                    <a class="list-group-item" href="">
                        <i class="fa fa-eye fa-fw text-muted"></i>
                        Проедложения
                    </a>
                </div>
            </div>


            <div class="panel wrapper-md padder-lg b box-shadow-lg text-center">
                <p class="h3 font-thin m-b-sm">Тендер</p>
                <p class="font-bold text-sm">Нужно выполнить работу? Объяви об этом всем</p>
                <p class="small text-muted text-xs">Актуально до 60 дней</p>
                <router-link class="btn btn-info btn-rounded" :to="{ name: 'tender.create'}">Разместить</router-link>
            </div>


        </div>
    </div>
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
                }
            }
        },
        beforeMount() {
            axios.post(`/profile/edit`)
                .then(response => {
                    this.user = response.data
                })
                .catch(e => {
                    this.errors.push(e)
                });
        },
    }
</script>
