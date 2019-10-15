<template>
    <div class="border-t-4 border-gray-400 my-4 pt-4">
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 inline-block p-2 text-gray-100" v-for="publication in children" :key="publication.id">
            <span
                class="block bg-gray-600 hover:bg-gray-700 rounded shadow p-4 relative"
                :class="{'shadow-outline': isActivePublication(publication)}"
                @click="setActivePublication(publication)"
            >
                <div class="text-2xl mb-2 h-16 overflow-hidden text-center"> {{ publication.title }} </div>
                <span
                    class="clickable absolute bottom-0 left-0 right-0 text-center p-2"
                    v-if="isActivePublication(publication)"
                    @click="editPublication(publication)"
                >
                    Edit
                </span>
            </span>
        </div>
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 inline-block p-2 text-gray-100">
            <span class="block bg-gray-300 hover:bg-gray-700 text-gray-700 hover:text-white rounded shadow p-4" @click="addPublication">
                <div class="text-2xl mb-2 h-16 overflow-hidden text-center clickable" >
                    Voeg een publicatie toe
                </div>
            </span>
        </div>
        <publication-children
            :publication="activePublication"
            :project="project"
            v-if="activePublication.id !== null && children.length > 0"
        >
        </publication-children>
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
