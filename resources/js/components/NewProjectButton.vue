<script>
    export default {
        name: "NewProjectButton",

        props: [
        ],

        data() {
            return {
            }
        },

        watch: {
        },

        mounted() {
        },

        computed: {
        },

        methods: {
            newProjectInModal() {
                this.$eventBus.$emit('newProjectInModal')
            }
        }
    }

</script>

