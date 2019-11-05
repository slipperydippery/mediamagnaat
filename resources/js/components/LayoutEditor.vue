<script>
    import VueMarkdown from 'vue-markdown';

    export default {
        name: "LayoutEditor",

        components: {
            VueMarkdown
        },

        props: [
            'inputlayout'
        ],

        data() {
            return {
                layout: {},
                background: '',
                backgrounds: [],
                example: {
                    cardnumber: 4
                },
                updating: false,
                videoHeight: 400,
            }
        },

        mounted() {
            this.layout = this.inputlayout
            this.background = this.randomImage()
            var i;
            for (i = 0; i < 30; i++) {
                this.backgrounds.push(this.randomImage())
            }
            this.setVideoHeight()
        },

        watch: {
        },

        computed: {
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

            randomImage() {
                return '/img/thumbnails/thumbnail_' + Math.ceil(Math.random() * 35) + '.jpg'
            },

            updateLayout() {
                var home = this
                if(! this.updating) {
                    this.updating = true
                    setTimeout(function() {
                        home.updating = false
                        home.patchLayout()
                        }, 2000
                    );
                }
            },

            patchLayout() {
                axios.patch('/api/layout/' + this.layout.id, {
                    layout: this.layout
                })
                    .then( response => {
                    } )
            },

            stringlimit(str) {
                if (str.length < this.layout.description_length) {
                    return str
                }
                return str.substr(1, this.layout.description_length) + '...';
            },

            inPixels(value){
                if( value != undefined ){
                    return (value * (this.videoHeight / 1000)) + 'px'
                }
            }
        }
    }
</script>
