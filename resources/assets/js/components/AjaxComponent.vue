<template>
    <div class="container">
        <button @click="update" class="btn btn-default text mb-1" v-if="!is_refresh">Refresh - {{ id }}</button>
        <span class="badge badge-primary mb-1">Refreshing..........</span>
        <ul class="list-group">
            <a href="#" class="list-group-item active">
                Categories
            </a>
            <a v-for="url in urldata" href="#" class="list-group-item">{{ url.name }}</a>
        </ul>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                urldata: [],
                is_refresh: false,
                id: 0
            }
        },
        mounted() {
            this.update()
        },
        methods: {
            update: function () {
                this.is_refresh = true
                axios.get('/realtime/ajax-categories').then((response) => {
                    console.log(response)
                    this.urldata = response.data
                    this.is_refresh = false
                    this.id++
                });
            }
        }
    }
</script>
