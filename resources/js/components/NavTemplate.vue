<script>
    export default {
        name: "NavTemplate.vue",

        data() {
            return {
                'isHidden': true
            }
        },

        methods: {
            toggleHidden() {
                console.log('toggle hidden');
                this.isHidden = ! this.isHidden
            }

        }
    }
</script>

