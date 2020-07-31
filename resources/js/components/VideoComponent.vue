<template>
    <div>
        <div class="alert alert-primary text-center" v-if="this.$data.isSharing">Ai deschis partajarea ecranului!</div>
        <vue-webrtc ref="webrtc" width="100%" :room-id="room.secret" @share-started="announceShare" @share-stopped="cancelShare" />

        <button class="btn btn-danger" @click="shareScreen">Partajeaza ecran</button>
    </div>
</template>
<script>
    import * as io from 'socket.io-client';
    window.io = io;

    export default {
        props: ['room'],
        mounted() {
            this.$refs.webrtc.join();
        },
        data() {
            return {
                isSharing: false,
            }
        },
        methods: {
            shareScreen() {
                this.$refs.webrtc.shareScreen();
            },
            announceShare() {
                this.$data.isSharing = true;
            },
            cancelShare() {
                this.$data.isSharing = false;
            }
        }
    }
</script>
