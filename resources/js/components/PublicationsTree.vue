<template>
    <div class="mt-8 text-left">
        <h2 class="ml-2 text-xl sm:text-base md:text-xl lg:text-2xl xl:text-3xl antialiased tracking-tight font-semibold text-gray-700 underline">
            Video's in jouw project
        </h2>
        <div class="relative w-full sm:w-1/2 md:w-1/3 lg:w-1/4 inline-block p-2 text-gray-100" v-if="project.entrypoint.publication != null">
            <div class="">
                <img class="" :src="project.entrypoint.publication.publicationable.thumbnail" alt="">
            </div>
            <div class="p-2 absolute top-0 bottom-0 left-0 right-0">
                <div class="w-full h-full bg-gray-600 hover:bg-blue-900 opacity-75 hover:opacity-100"></div>
            </div>
            <div class="block absolute top-0 bottom-0 left-0 right-0">
                <div class="w-full h-full">
                    <div class="text-2xl mb-2 h-16 overflow-hidden text-center p-10"> {{ project.entrypoint.publication.title }} </div>
                    <span
                        class="clickable absolute bottom-0 left-0 right-0 text-center p-10"
                        @click="editPublication(project.entrypoint.publication)"
                    >
                        <span class="px-6 py-1 bg-white hover:bg-gray-200 text-black rounded shadow"
                              @click="editPublication(project.entrypoint.publication)"
                        >
                            Edit
                        </span>
                    </span>
                </div>
            </div>
        </div>
        <publication-children
            :publication = project.entrypoint.publication
            :project = project
            v-if="project.entrypoint.publication != null"
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
