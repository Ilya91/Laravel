<template>
    <div class="container">
        <div class="row form-group">
            <div class="col-sm-4">
                <select name="" class="form-control" v-model="usersSelect">

                </select>
            </div>
            <div class="col-sm-12">
                <textarea rows="6" readonly="" class="form-control">{{ dataMessages.join('\n') }}</textarea>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Your message..." v-model="message">
                <div class="input-group-append">
                    <button @click="sendMessage" class="btn btn-online-secondary" type="button">Send</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                dataMessages: [],
                message: '',
            }
        },
        mounted() {
            var socket = io('http://127.0.0.1:3000');
            var app = this;
            socket.on('news-action:App\\Events\\NewMessage', function (data) {
                console.log(data);
                this.dataMessages.push(data.message);
            }.bind(this));
        },
        methods: {
            sendMessage: function () {
                axios({
                    method: 'get',
                    url: '/realtime/send-message',
                    params: {
                        message: this.message
                    }
                }).then((response) => {
                    this.message = ''
                });
            }
        }
    }
</script>
