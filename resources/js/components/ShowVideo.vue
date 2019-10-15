<template>

        <video-player  class="video-player-box"
                       ref="videoPlayer"
                       :options="playerOptions"
                       :playsinline="true"
                       customEventName="customstatechangedeventname"

                       @play="onPlayerPlay($event)"
                       @pause="onPlayerPause($event)"
                       @ended="onPlayerEnded($event)"
                       @waiting="onPlayerWaiting($event)"
                       @playing="onPlayerPlaying($event)"
                       @loadeddata="onPlayerLoadeddata($event)"
                       @timeupdate="onPlayerTimeupdate($event)"
                       @canplay="onPlayerCanplay($event)"
                       @canplaythrough="onPlayerCanplaythrough($event)"

                       @statechanged="playerStateChanged($event)"
                       @ready="playerReadied"
        >
        </video-player>

</template>

<script>
    // Similarly, you can also introduce the plugin resource pack you want to use within the component/
    // import 'some-videojs-plugin'
    export default {
        props: [
            'video',
            'playing'
        ],
        data() {
            return {
                playerOptions: {
                    // videojs options
                    muted: true,
                    language: 'en',
                    playbackRates: [0.7, 1.0, 1.5, 2.0],
                    aspectRatio: '16:9',
                    sources: [{
                        type: "video/mp4",
                        src: "https://cdn.theguardian.tv/webM/2015/07/20/150716YesMen_synd_768k_vp8.webm"
                    }],
                    poster: "/static/images/author.jpg",
                },
            }
        },

        mounted() {
            console.log('this is current player instance object', this.player)
            this.playerOptions.sources[0].src = this.video
        },

        watch: {
            video(val) {
                console.log(val)
                this.playerOptions.sources[0].src = val
                this.player.currentTime(0)
                this.player.play()
            },

            playing(val) {
                if(val) {
                    this.player.play()
                } else {
                    this.player.pause()
                }
            }
        },

        computed: {
            player() {
                return this.$refs.videoPlayer.player
            },
        },

        methods: {
            togglePlayPause() {
                if (this.player.paused()) {
                    this.player.play();
                }
                else {
                    this.player.pause();
                }
            },
            // listen event
            onPlayerPlay(player) {
                this.$emit('playing')
                console.log('player play!', player)
            },
            onPlayerPause(player) {
                this.$emit('pausing')
                console.log('player pause!', player)
                // this.playerOptions.sources[0].src = "http://vjs.zencdn.net/v/oceans.mp4"
                // player.currentTime(0)
                // player.play()

            },
            // ...player event

            // or listen state event
            playerStateChanged(playerCurrentState) {
                // console.log('player current update state', playerCurrentState)
            },

            // player is ready
            playerReadied(player) {
                console.log('the player is readied', player)
                // you can use it to do something...
                setTimeout(() => player.play(), 100);

            },

            onPlayerTimeupdate(player) {
                // console.log('timepudate', player.currentTime())
            },

            onPlayerPlaying(event) {
                console.log('playing now')
            },

            onPlayerWaiting(event){

            },

            onPlayerCanplay(event){

            },

            onPlayerEnded(event) {
                console.log('ended')
            },

            onPlayerCanplaythrough(event){
                //I don't know what this is...
            },

            onPlayerLoadeddata(event) {
                //
            }
        }
    }
</script>
