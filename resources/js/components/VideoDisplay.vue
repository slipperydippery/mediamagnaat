<script>
    export default {
        name: "VideoDisplay.vue",

        props: [
            'inputlayout'
        ],

        data() {
            return {
                layout: {},
            }
        },

        mounted() {
            this.layout = this.inputlayout
        },

        methods: {
            stringlimit(str) {
                return str.substr(1, this.layout.description_length) + '...';
            }
        }
    }
</script>
