<script>
    export default {
        name: "EditProjectButton",

        props: [
            'project'
        ],

        methods: {
            editProjectInModal() {
                this.$eventBus.$emit('editProjectInModal', this.project)
            }
        }
    }
</script>

