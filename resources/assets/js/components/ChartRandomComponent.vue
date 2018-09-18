<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <line-chart :chart-data="data" :height="100" :options="{responsive: true, maintainAspectRation: true}"></line-chart>
                <button @click="update" class="btn btn-primary">Update</button>
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
            }
        },
        mounted() {
            this.update()
        },
        methods: {
            update: function () {
                axios.get('/realtime/random-data').then((response) => {
                    this.data = response.data
                });
            }
        }
    }
</script>
