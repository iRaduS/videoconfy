<template>
    <div class="text-center">
        <div class="alert alert-primary text-center" v-if="this.$data.isSharing">You have shared your screen with success!</div>
        <webrtc ref="webrtc" width="100%" :room-id="room.secret" :enable-video="false" @share-started="announceShare" @share-stopped="cancelShare" />

        <div class="text-center my-3">
            <button class="btn btn-danger" @click="shareScreen">Share your screen</button>
            <button class="btn btn-primary" @click="leaveCall" v-if="this.$data.exited">Cancel the call</button>
            <a class="btn btn-primary" :href="'/room/join/' + this.$props.room.secret" v-else-if="!this.$data.exited">Rejoin the call</a>
        </div>
    </div>
</template>
<script>
    import * as io from 'socket.io-client';
    window.io = io;

    export default {
        props: ['room'],
        mounted() {
            this.$data.exited = true;
            this.$refs.webrtc.join();
        },
        data() {
            return {
                isSharing: false,
                exited: true,
            }
        },
        methods: {
            leaveCall() {
                this.$data.exited = false;
                this.$refs.webrtc.leave();
            },
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
