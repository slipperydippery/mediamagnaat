<script>
    export default {
        name: "NewPublication",

        methods: {
            newPublicationInModal() {
                this.$eventBus.$emit('newPublicationInModal')
            }
        }
    }
</script>

