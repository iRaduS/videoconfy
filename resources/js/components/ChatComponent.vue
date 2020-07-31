<template>
    <div>
                    <ul class="chat">
                        <li v-for="conversation in conversations">
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">{{ conversation.user.name }}</strong>
                                </div>
                                <p>
                                    {{ conversation.message }}
                                </p>
                            </div>
                        </li>
                    </ul>
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." v-model="message" @keyup.enter="storeMessage" autofocus />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat" @click.prevent="storeMessage">
                                Send</button>
                        </span>
                    </div>
    </div>
</template>

<script>
    export default {
        props: ['room'],

        data() {
            return {
                conversations: [],
                message: '',
                room_id: this.$props.room.id,
            }
        },
        mounted() {
            this.listenIncommingMessage();
        },
        methods: {
            storeMessage() {
                axios.post('/conversation', { message: this.message, room_id: this.$props.room.id })
                    .then((response) => {
                        this.$data.message = '';
                        this.$data.conversations.push(response.data);
                    });
            },
            listenIncommingMessage() {
                Echo.private('rooms.' + this.$data.room_id)
                    .listen('NewMessage', (e) => {
                        console.log('se apeleaza');
                        this.$data.conversations.push(e);
                    });
            }
        }
    }
</script>
