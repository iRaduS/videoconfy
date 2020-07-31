<template>
    <div class="text-center">
        <div class="alert alert-primary text-center" v-if="this.$data.isSharing">You have shared your screen with success!</div>
        <webrtc ref="webrtc" width="100%" :room-id="room.secret" @share-started="announceShare" @share-stopped="cancelShare">
            <template v-slot:buttons>
                <button class="btn btn-close-call" @click="leaveCall" v-if="$data.exited"><i class="fas fa-phone-slash"></i></button>
                <a class="btn btn-close-call" :href="'/room/join/' + $props.room.secret" v-else-if="!$data.exited"><i class="fas fa-phone"></i></a>
                <button class="btn btn-screen-share" type="button" @click="shareScreen"><i class="fas fa-desktop"></i></button>
            </template>
        </webrtc>
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
