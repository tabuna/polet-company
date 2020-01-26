<template>

    <div class="bg-white b box-shadow">
        <div class="wrapper-md">
            <div class="row m-b-md" v-if="status.load">

                <div class="col-xs-12">
                    <form class="form-horizontal" enctype="multipart/form-data" v-on:submit.prevent="createTender">

                        <div class="page-header">
                            <h3 class="uppercase font-thin"><i class="icon-docs m-r-xs"></i> Подать бесплатную заявку
                            </h3>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="title">Заголовок</label>

                            <div class="col-md-8">
                                <input id="title" name="title" placeholder="Заголовок обьявления"
                                       maxlength="200"
                                       class="form-control input-md" required="" type="text" v-model="title">
                                <span class="help-block text-xs">Не пишите в заголовке цену и контактную информацию — для этого есть отдельные поля — и не используйте слово «продам» </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="description">Описание</label>

                            <div class="col-md-8">
                                        <textarea class="form-control no-resize" id="description" rows="10"
                                                  name="description"
                                                  maxlength="1000"
                                                  v-model="description"
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
                                           v-model="price"
                                           placeholder="Цена" required="" type="number" min="0">
                                </div>
                                <span class="help-block text-xs">Если вы не знаете или не уверены в стоимости работ или товара, оставьте поле пустым, путь партнёры сами предлогают свою цену</span>
                            </div>
                        </div>


                        <div class="form-group" v-bind:class="{ 'has-error' : errors.tags }">
                            <label class="col-sm-3 control-label">Теги</label>
                            <div class="col-sm-9">

                                <div>
                                    <multiselect v-model="selectedTags" id="ajax" label="name"
                                                 track-by="slug"
                                                 placeholder="Введите ключевые слова"
                                                 :options="allTags"
                                                 :multiple="true"
                                                 :searchable="true"
                                                 :loading="isLoading"
                                                 :internal-search="false"
                                                 :clear-on-select="false"
                                                 :close-on-select="false"
                                                 :options-limit="15"
                                                 :limit="15"
                                                 :limit-text="limitText"
                                                 @search-change="asyncFind"
                                                 :taggable="true"
                                                 @tag="addTag"
                                                 :selectLabel="'Нажмите Enter для выбора'"
                                                 :selectedLabel="'Выбранный'"
                                                 :deselectLabel="'Нажмите Enter, чтобы удалить'"

                                    >
                                        <template slot="option" scope="props">
                                            <div class="option__desc">
                                                <span class="option__title">{{ props.option.name }}</span>
                                                <span class="badge bg-info pull-right">{{ props.option.count }}</span>
                                            </div>
                                        </template>


                                        <span slot="noResult">К сожалению, элементов не найдено.</span></multiselect>
                                </div>

                                <p class="help-block" v-if="errors.tags">
                                    {{ errors.tags }}
                                </p>
                                <p class="help-block" v-else="errors.name">
                                    Выберите от 1 до 15 ключевых слов к которым относится компания.
                                </p>
                            </div>
                        </div>


                        <div class="page-header">
                            <h4 class="font-thin"><i class="icon-printer m-r-xs"></i> Документы и приложения</h4>
                        </div>

                        <dropzone id="dropFileUpload" ref="dropFileUpload" url="/api/tender/upload"
                                  v-on:vdropzone-success="showSuccess"
                                  v-on:vdropzone-removed-file="removeFile"
                                    :language="language"
                                    :useFontAwesome="true"
                                    :maxFileSizeInMB="10">
                        </dropzone>
                        <span class="help-block text-xs text-right">Загружайте все необходимые документы, до 10 мегабайт</span>


                        <div class="page-header">
                            <h4 class="font-thin"><i class="icon-people  m-r-xs"></i> Контактная информация</h4>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">Имя</label>

                            <div class="col-md-8">
                                <input id="name" name="name"
                                       placeholder="Имя продавца"
                                       class="form-control input-md" v-model="user.agent_name" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Email</label>

                            <div class="col-md-8">
                                <input id="email" name="email" class="form-control"
                                       placeholder="Email продавца" v-model="user.email"
                                       required="" type="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Телефон</label>

                            <div class="col-md-8">
                                <input id="phone" name="phone"
                                       placeholder="Контактный телефон" v-model="user.phone"
                                       class="form-control input-md" required="" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Город</label>

                            <div class="col-md-8">
                                <multiselect v-model="selectedCity" label="name"
                                             track-by="id"
                                             placeholder="Введите основной город"
                                             :options="allCity"
                                             :multiple="false"
                                             :searchable="true"
                                             :loading="isLoadingCity"
                                             :close-on-select="true"
                                             @search-change="asyncFindCity"
                                             :taggable="false"
                                             :selectLabel="''"
                                             :selectedLabel="''"
                                             :deselectLabel="''"

                                >
                                    <template slot="option" scope="props">
                                        <div class="option__desc">
                                            <span class="option__title">{{ props.option.name }}</span>
                                        </div>
                                    </template>


                                    <span slot="noResult">К сожалению, элементов не найдено.</span></multiselect>
                            </div>
                        </div>


                        <p class="text-right">
                            <button type="submit" class="btn btn-info btn-rounded">
                                <span v-if="status.submit">Отправка <i class='fa fa-spinner fa-spin'></i></span>
                                <span v-else="status.submit">Отправить</span>
                            </button>
                        </p>
                    </form>


                </div>

            </div>
        </div>
    </div>

</template>


<script>
    import Multiselect from 'vue-multiselect';
    import Dropzone from 'vue2-dropzone'
    export default {
        props: ['id'],
        components: {
            Dropzone,
            Multiselect
        },
        data: function () {
            return {
                language:{
                    dictDefaultMessage: 'Перетащите файлы, чтобы начать загрузку',
                    dictFallbackMessage: "Ваш браузер не поддерживает загрузку файлов drag'n'drop.",
                    dictFallbackText: 'Пожалуйста, используйте приведенную ниже форму для загрузки ваших файлов, как в старые времена.',
                    dictFileTooBig: 'Файл слишком большой ({{filesize}} MiB). Максимальный размер файла: {{maxFilesize}} MiB.',
                    dictInvalidFileType: 'Вы не можете загружать файлы этого типа.',
                    dictResponseError: 'Сервер ответил кодом {{statusCode}}.',
                    dictCancelUpload: 'Отменить загрузку',
                    dictCancelUploadConfirmation: 'Вы действительно хотите отменить эту загрузку?',
                    dictRemoveFile: 'Удалить файл',
                    dictRemoveFileConfirmation: null,
                    dictMaxFilesExceeded: 'Вы не можете загружать больше файлов.',
                    dictFileSizeUnits: { tb: "TB", gb: "GB", mb: "MB", kb: "KB", b: "b" },
                },
                selectedTags: [],
                allTags: [],
                selectedCity: [],
                allCity: [],
                isLoading: false,
                isLoadingCity: false,
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
                },
                title: '',
                description: '',
                price: '',
                download: [],
                status: {
                    load: false,
                    submit: false,
                    self: false,
                },
                errors: {},
            }
        },
        beforeMount() {
            axios.post(`/api/profile/edit`)
                .then(response => {
                    this.user = response.data;
                    this.status.load = true;
                    this.selectedCity = response.data.city;
                    moduleLoad();
                })
                .catch(e => {
                    this.errors.push(e)
                });
        },
        mounted() {
            this.load();
        },
        methods: {
            'showSuccess': function (file,response) {
                response.file = file.name;
                this.download.push(response);
            },
            'removeFile': function (file, error, xhr) {

                let dowload = this.download;

                this.download.forEach(function(item, i, arr) {

                    if(item.file === file.name){
                        delete dowload[i];
                    }
                });

                this.download = dowload;
            },
            load: function () {
                $('#adb').show();
            },
            limitText (count) {
                return `и ${count} ещё тегов`
            },
            asyncFind (query) {
                this.isLoading = true

                axios.get(`/api/tender/tags/` + query)
                    .then(response => {
                        //this.user = response.data;
                        this.status.submit = false;
                        this.allTags = response.data;
                        this.isLoading = false;

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

            },
            asyncFindCity (query) {
                this.isLoadingCity = true

                axios.post(`/api/other/city/` + query)
                    .then(response => {
                        //this.user = response.data;
                        this.status.submit = false;
                        this.allCity = response.data;
                        this.isLoadingCity = false;

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

            },
            addTag (newTag) {
                const tag = {
                    id: 1,
                    slug: newTag,
                    name: newTag,
                    count: 0,
                };
                this.selectedTags.push(tag);
                this.allTags.push(tag);

            },
            createTender(){
                this.status.submit = true;
                axios.post(`/api/tender/create`, {
                    title: this.title,
                    description: this.description,
                    price: this.price,
                    name: this.user.agent_name,
                    email: this.user.email,
                    phone: this.user.phone,
                    city: this.selectedCity,
                    tags: this.selectedTags,
                    files: this.download,
                })
                    .then(response => {
                        this.status.submit = false;

                        swal({
                            title: 'Успешно!',
                            type: 'success',
                            text: 'Тендер был успешно добавлен',
                            timer: 2500,
                            showConfirmButton: false,
                        }).catch(swal.noop);

                        this.$router.push({ name: 'tender.show', params: { id: response.data.id }})
                    })
                    .catch(error => {
                        this.errors = error.response.data;


                        swal({
                            title: 'Ошибка!',
                            type: 'error',
                            text: 'Проверьте вводимые данные',
                            timer: 2500,
                            showConfirmButton: false,
                        }).catch(swal.noop);
                        this.status.submit = false;

                    });
            }
        }
    }
</script>
