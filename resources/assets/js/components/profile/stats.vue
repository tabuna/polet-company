<template>


    <div class="bg-white b box-shadow">
        <div class="wrapper-md">

            <div v-if="statistics.render">
                <div class="padder-v">
                    <canvas id="canvas"></canvas>
                </div>

                <div class="wrapper-lg">
                    <div style="width: 50%; margin: 0 auto;">
                        <canvas id="chart-area"></canvas>
                    </div>
                </div>
            </div>

            <div class="jumbotron text-center bg-white not-found" v-if="!statistics.render">

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
                statistics: {
                    time: '',
                    city: '',
                    render: false,
                },
                time:{
                    labels: [],
                    data: [],
                },
                city:{
                    labels: [],
                    data: [],
                    amount: 0,
                    amountData: [],
                },
                errors: [],
            }
        },
        beforeMount() {
            axios.post(`/api/profile/statistics`)
                .then(response => {


                    let currentObject = this;

                    let amount = 0;
                    response.data.city.forEach(function(item) {
                            currentObject.city.labels.push(item.city);
                            currentObject.city.data.push(item.count);
                            amount = amount + item.count;
                    });
                    currentObject.city.amount = amount;


                    response.data.city.forEach(function(item) {
                        let data = parseFloat(100 * item.count/amount).toFixed(2);
                        currentObject.city.amountData.push(data);
                    });

                    response.data.time.forEach(function(item) {
                        currentObject.time.labels.push(item.dat);
                        currentObject.time.data.push(item.count);
                    });

                    this.statistics = response.data;
                })
                .catch(e => {
                    this.errors.push(e)
                });
        },
        mounted() {
            this.load();
        },
        watch: {
            'statistics.render': function (val, oldVal) {
                let currentObject = this;
                setTimeout(function () {
                    if(currentObject.statistics.render) {
                        currentObject.renderChars();
                    }
                }, 300);
            },
        },
        methods: {
            load: function () {
                $('#adb').show();
            },
            renderChars: function () {

                this.time.labels.reverse();
                this.time.data.reverse();

                var config = {
                    type: 'line',
                    data: {
                        labels: this.time.labels,
                        datasets: [{
                            label: "Количество посещений",
                            backgroundColor: window.chartColors.blue,
                            borderColor: window.chartColors.blue,
                            data: this.time.data,
                            fill: false,
                        }]
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Статистика посещений'
                        },
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        }

                    }
                };

                var ctx = document.getElementById("canvas").getContext("2d");
                window.myLine = new Chart(ctx, config);


                var config = {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: this.city.amountData,
                            backgroundColor: [
                                window.chartColors.red,
                                window.chartColors.orange,
                                window.chartColors.yellow,
                                window.chartColors.green,
                                window.chartColors.blue,
                            ],
                            label: 'Dataset 1'
                        }],
                        labels: this.city.labels
                    },
                    options: {
                        responsive: true,
                        legend: {
                            position: 'bottom',
                        },
                        title: {
                            display: true,
                            text: 'Статистика по городам'
                        },
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        }
                    }
                };
                var ctx = document.getElementById("chart-area").getContext("2d");
                window.myDoughnut = new Chart(ctx, config);

            }
        }
    }
</script>
