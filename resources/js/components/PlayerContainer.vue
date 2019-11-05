<script>
    export default {
        name: "PlayerContainer",

        props: [
            'project',
            'layout'
        ],

        data() {
            return {
                playing: false,
                activePublication: {
                    id: null,
                    publicationable: {
                        link: null
                    },
                },
                videoHeight: 100
            }
        },

        mounted() {
            this.activePublication = this.project.entrypoint.publication
            this.setVideoHeight()
        },

        computed: {
            children() {
                var publicationchildren = []
                this.project.publications.forEach( thispublication => {
                    if( thispublication.publication_id == this.activePublication.id ){
                        publicationchildren.push( thispublication )
                    }
                })
                return publicationchildren
            },
            parent() {
                if(! this.activePublication.publication_id ){
                    return false
                }
                var parent = false
                this.project.publications.forEach( thispublication => {
                    if( thispublication.id == this.activePublication.publication_id ){
                        parent = thispublication
                    }
                })
                return parent
            }
        },

        methods: {
            setVideoHeight() {
                var home = this
                setTimeout( function() {
                    if( home.$refs.videooverlay != undefined) {
                        home.videoHeight = home.$refs.videooverlay.clientHeight
                    }
                    home.setVideoHeight()
                }, 500 )
            },

            inPixels(value){
                if( value != undefined ){
                    return (value * (100 / this.videoHeight)) + 'px'
                }
            },

            togglePlayPause() {
                console.log('toggling from overlay')
                this.playing = ! this.playing

            },

            setActivePublication(publication) {
                this.activePublication = publication
            },

            stringlimit(str) {
                return str.substr(1, this.layout.description_length) + '...';
            }
        }
    }
</script>

