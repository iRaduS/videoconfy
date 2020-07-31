<template>
        <section class="chat-room-section">
            <div class="container">
                <div class="row">
                    <div class="col messages">
                        <div class="message" v-for="conversation in conversations">
                            <p class="sender-name">{{ conversation.user.name }}</p>
                            <p class="m-0">{{ conversation.message }}</p>
                        </div>
                    </div>
                </div>
                <div class="row writing-section">
                    <div class="col-11"><input type="text" class="chat-input form-control" v-model="message" @keyup.enter="storeMessage" placeholder="Enter a message..." /></div>
                    <div class="col-1 p-0"><button class="btn btn-send" type="button" @click.prevent="storeMessage"><i class="fas fa-paper-plane"></i></button></div>
                </div>
            </div>
        </section>
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
