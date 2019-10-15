<template>
    <div class="mt-8 text-left">
        <h2 class="ml-2 text-xl sm:text-base md:text-xl lg:text-2xl xl:text-3xl antialiased tracking-tight font-semibold text-gray-700 underline">
            Video's in jouw project
        </h2>
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 inline-block p-2 text-gray-100">
            <span class="block bg-gray-600 hover:bg-gray-700 rounded shadow p-4 shadow-outline">
                <span class="icons flex flex-row-reverse pb-4 text-gray-400">
                </span>
                <div class="text-2xl mb-2 h-16 overflow-hidden text-center"> {{ project.entrypoint.publication.title }} </div>
                <span
                    class="clickable absolute bottom-0 left-0 right-0 text-center p-2"
                    @click="editPublication(project.entrypoint.publication)"
                >
                    Edit
                </span>
            </span>
        </div>
        <publication-children
            :publication = project.entrypoint.publication
            :project = project
        >
        </publication-children>
    </div>
</template>

<script>
    export default {
        name: "PublicationsTree",

        props: [
            'project'
        ],

        data() {
            return {

            }
        },

        mounted() {
            // this.$eventBus.$on('addedPublication', this.addedPublication)
        },

        methods: {
            addedPublication(publication) {
                // if(publicationqqq)
            },

            editPublication(publication) {
                this.$eventBus.$emit('editPublicationInModal', publication)
            }
        }
    }

</script>
