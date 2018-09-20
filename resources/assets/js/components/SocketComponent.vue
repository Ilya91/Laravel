<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <line-chart :chart-data="data" :height="100" :options="{responsive: true, maintainAspectRation: true}"></line-chart>
                <input type="checkbox" v-model="realtime"> realtime
                <input type="text" v-model="label">
                <input type="text" v-model="sale">
                <button @click="sendData" class="btn btn-primary">Refresh</button>
            </div>
        </div>
    </div>
</template>

<script>
    import LineChart from './LineChart'
    export default {
        components: {
            LineChart
        },
        data: function () {
            return {
                data: [],
                realtime: false,
                label: '',
                sale: 500,
            }
        },
        mounted() {
            var socket = io('http://127.0.0.1:3000');
            var app = this;
            socket.on('news-action:App\\Events\\NewEvent', function (data) {
                this.data = data.result;
            }.bind(this));
        },
        methods: {
            update: function () {
                axios.get('/realtime/new-event').then((response) => {
                    this.data = response.data
                });
            },
            sendData: function () {
                axios({
                    method: 'get',
                    url: '/realtime/new-event',
                    params: {
                        label: this.label,
                        sale: this.sale,
                        realtime: this.realtime
                    }
                }).then((response) => {
                    this.data = response.data
                });
            }
        }
    }
</script>
