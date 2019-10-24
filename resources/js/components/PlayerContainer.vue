<script>
    export default {
        name: "PlayerContainer",

        props: [
            'project'
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
            }
        },

        mounted() {
            this.activePublication = this.project.entrypoint.publication
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
            togglePlayPause() {
                console.log('toggling from overlay')
                this.playing = ! this.playing

            },

            setActivePublication(publication) {
                this.activePublication = publication
            }
        }
    }
</script>

