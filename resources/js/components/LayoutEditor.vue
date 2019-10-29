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
                    cardnumber: 8
                },
                updating: false,
            }
        },

        mounted() {
            this.layout = this.inputlayout
            this.background = this.randomImage()
            var i;
            for (i = 0; i < 30; i++) {
                console.log('pusing ' + i)
                this.backgrounds.push(this.randomImage())
            }
        },

        watch: {
        },

        computed: {
        },

        methods: {
            randomImage() {
                return '/img/thumbnails/thumbnail_' + Math.ceil(Math.random() * 35) + '.jpg'
            },

            updateLayout() {
                console.log('updateLayout')
                var home = this
                if(! this.updating) {
                    this.updating = true
                    setTimeout(function() {
                        console.log('timeout')
                        home.updating = false
                        home.patchLayout()
                        }, 2000
                    );
                }
            },

            patchLayout() {
                console.log('patching')
                axios.patch('/api/layout/' + this.layout.id, {
                    layout: this.layout
                })
                    .then( response => {
                        console.log(response.data)
                    } )
            },

            stringlimit(str) {
                return str.substr(1, this.layout.description_length) + '...';
            }

        }
    }
</script>
