<template>
    <div class="">
        <div class="border-t-4 border-gray-400 my-4 pt-4 flex align-top items-stretch">

            <div class="relative w-full sm:w-1/2 md:w-1/3 lg:w-1/4 inline-block p-2 text-gray-100" v-for="publication in children" :key="publication.id"
                 :class="{'shadow-outline': isActivePublication(publication)}"
                 @click="setActivePublication(publication)"
            >
                <div class="">
                    <img class="" :src="publication.publicationable.thumbnail" alt="">
                </div>
                <div class="p-2 absolute top-0 bottom-0 left-0 right-0">
                    <div class="w-full h-full bg-gray-600 hover:bg-blue-900 opacity-75 hover:opacity-100"></div>
                </div>
                <div class="block absolute top-0 bottom-0 left-0 right-0">
                    <div class="w-full h-full">
                        <div class="text-2xl mb-2 h-16 overflow-hidden text-center p-10"> {{ publication.title }} </div>
                        <span
                            class="clickable absolute bottom-0 left-0 right-0 text-center p-10"
                            v-if="isActivePublication(publication)"
                        >
                            <span class="px-6 py-1 bg-white hover:bg-gray-200 text-black rounded shadow"
                                  @click="editPublication(publication)"
                            >
                                edit
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="relative inline-block p-2 text-black hover:bg-gray-200">
                <div class="p-2 flex flex-col items-center justify-center p-12  clickable"
                    @click="addPublication"
                >
                    <i class="material-icons md-3">
                        add_circle
                    </i>
                    <span>Voeg publicatie toe</span>
                </div>
            </div>
        </div>

        <publication-children
            :publication="activePublication"
            :project="project"
            v-if="activePublication.id !== null && children.length > 0"
        >
        </publication-children>
        <span class="text-gray-100">.</span>
    </div>

</template>

<script>
    export default {
        name: "PublicationChildren",

        props: [
            'publication',
            'project'
        ],

        data() {
            return {
                activePublication: {
                    id: null
                }
            }
        },

        mounted() {
            if(this.children.length){
                this.setActivePublication(this.children[0])
            }
        },

        computed: {
            children() {
                var publicationchildren = []
                this.project.publications.forEach( thispublication => {
                    if( thispublication.publication_id == this.publication.id ){
                        publicationchildren.push( thispublication )
                    }
                })
                return publicationchildren
            }
        },

        methods: {
            addPublication() {
                this.$eventBus.$emit('newChildPublicationInModal', this.publication)
            },

            setActivePublication(publication){
                this.project.publications.forEach( thispublication => {
                    if(thispublication.id == publication.id){
                        this.activePublication = thispublication
                    }
                } )
            },

            isActivePublication(publication) {
                return publication.id === this.activePublication.id
            },

            editPublication(publication) {
                this.$eventBus.$emit('editPublicationInModal', publication)
            }
        }
    }
</script>
