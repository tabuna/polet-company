<template>

    <div class="bg-white b box-shadow">
        <div class="wrapper-md">
    <div class="row m-b-md">

        <div class="col-xs-12">
            <form class="form-horizontal" enctype="multipart/form-data">

                <div class="page-header">
                    <h3 class="uppercase font-thin"><i class="icon-docs m-r-xs"></i> Подать бесплатную заявку</h3>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="title">Заголовок</label>

                    <div class="col-md-8">
                        <input id="title" name="title" placeholder="Заголовок обьявления"
                               class="form-control input-md" required="" type="text">
                        <span class="help-block text-xs">Не пишите в заголовке цену и контактную информацию — для этого есть отдельные поля — и не используйте слово «продам» </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="description">Описание</label>

                    <div class="col-md-8">
                                        <textarea class="form-control no-resize" id="description" rows="10"
                                                  name="description"
                                                  placeholder="Подробно опишите товар или услугу которая необходима. Не указывайте в описании телефон и e-mail — для этого есть отдельные поля">
                                        </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="price">Цена</label>

                    <div class="col-md-8">
                        <div class="input-group"><span class="input-group-addon b"><i
                                class="fa fa-rub"></i></span>
                            <input id="price" name="price" class="form-control"
                                   placeholder="Цена" required="" type="number" min="0">
                        </div>
                    </div>
                </div>


                <div class="page-header">
                    <h4 class="font-thin"><i class="icon-printer m-r-xs"></i> Документы и приложения</h4>
                </div>

                <dropzone id="myVueDropzone" url="https://httpbin.org/post" v-on:vdropzone-success="showSuccess">
                    <!-- Optional parameters if any! -->
                    <input type="hidden" name="token" value="xxx">
                </dropzone>


                <div class="page-header">
                    <h4 class="font-thin"><i class="icon-people  m-r-xs"></i> Контактная информация</h4>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="name">Имя</label>

                    <div class="col-md-8">
                        <input id="name" name="name"
                               placeholder="Имя продавца"
                               class="form-control input-md" required="" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Email</label>

                    <div class="col-md-8">
                        <input id="email" name="email" class="form-control"
                               placeholder="Email продавца" value=""
                               required="" type="email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> Телефон</label>

                    <div class="col-md-8">
                        <input id="phone" name="phone"
                               placeholder="Контактный телефон" value=""
                               class="form-control input-md" required="" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Область</label>

                    <div class="col-md-8">
                        <select id="selector-country_id" name="country_id"
                                class="form-control selecter">
                            <option selected disabled>Выберите область ...</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="city_id">Город</label>

                    <div class="col-md-8">
                        <select id="city_id" disabled name="city_id"
                                class="form-control">
                            <option selected disabled>Выберите Город ...</option>
                        </select>
                    </div>
                </div>


                <p class="text-right">
                    <button type="submit" class="btn btn-info btn-rounded">Отправить</button>
                </p>
            </form>


        </div>

    </div>
        </div>
    </div>

</template>


<script>
    import Dropzone from 'vue2-dropzone'
    export default {
        props: ['id'],
        components: {
            Dropzone
        },
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

        },
        mounted() {
            this.load();
        },

        methods: {
            'showSuccess': function (file) {
                console.log('A file was successfully uploaded')
            },
            load: function () {
                $('#adb').show();
            },
        }
    }
</script>
