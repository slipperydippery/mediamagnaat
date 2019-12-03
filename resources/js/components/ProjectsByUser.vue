<script>
    export default {
        name: "ProjectsByUser",

        props: [
            'projects'
        ],

        data() {
            return {
            }
        },

        mounted() {
            this.$eventBus.$on('addedProject', this.addProject);
        },

        computed: {
            chunkedDecks () {
                return _.chunk(this.projects,4)
            },
        },

        methods: {
            addProject(project) {
                console.log('adding project')
                this.projects.push(project)
                this.$forceUpdate()
            },

            cardCounter(project) {
                if('cards' in project) {
                    return project.cards.length
                }
                return 0
            },

            fontSize(string) {
                return ((Math.round((10 / Math.pow(string.length, 0.4)) * 10))/ 10) ;
            },

            thumbnail(project) {
                if (project.entrypoint && project.entrypoint.publication != null) {
                    console.log('testing');
                    return project.entrypoint.publication.publicationable.thumbnail
                }
                return '/img/page.svg'
            }
        }
    }
</script>

