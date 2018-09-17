<template>
    <ul class="list-group">
        <a href="#" class="list-group-item active">
            Categories
        </a>
        <a v-for="url in urldata" href="#" class="list-group-item">{{ url.name }}</a>
    </ul>
</template>

<script>
    export default {
        props: [
            'urldata',
        ],
        mounted() {
            this.update();
        },
        methods: {
            update: function () {
                console.log(this.urldata);
            }
        }
    }
</script>
