<template>
    <portal to="publication">
        <div class="fixed top-0 left-0 w-full h-full bg-gray-300" v-show="show" ref="portal" @click.self="resetModal">
            <div class="max-w-sm rounded overflow-hidden lg:shadow-lg lg:border mx-auto mt-10 pt-2 pb-2 bg-white">
                <div class="relative px-6 py-4">
                    <button class="absolute top-0 right-0 mr-4 text-gray-800 hover:text-red-800" @click="resetModal">
                        <i class="material-icons">
                            close
                        </i>
                    </button>
                    <div class="font-bold text-xl mb-6 text-center">New Publication</div>
                    <div class="block mb-3 text-gray-700 text-sm font-bold">
                        <label class="block mb-2" for="input">Publication name</label>
                        <input
                            id="input"
                            name="input"
                            type="text"
                            ref="input"
                            class="form-input mt-1 block w-full"
                            placeholder="Give your publication a recognizable name"
                            required
                            v-model="publication.title"
                            @keydown.esc="resetModal"
                        >
                        <label class="block mb-2 mt-4">
                            <span class="text-gray-700">Description</span>
                            <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="A short description, you can build this out later." v-model="publication.description"></textarea>
                        </label>
                        <label class="block mb-2" for="input">Video link</label>
                        <input type="file" class="form-control" v-on:change="onFileChange" accept=".mp4">
                        <div class="mt-3">Gekozen bestand: {{ video.file ? video.file.name : '' }}</div>

                    </div>
                    <button type="submit" class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5" @click="storePublication">
                        <span v-if="newPublication">
                            Create Publication
                        </span>
                        <span v-else>
                            Update Publication
                        </span>
                    </button>
                    <button type="submit" class="block w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-5"
                            @click="deletePublication(publication)"
                            v-if=" ! newPublication"
                    >
                        <span >
                            Verwijder publicatie
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </portal>
</template>

<script>
    export default {
        name: "ManagePublicationModal",

        props: [
            'entrypoint',
            'project_id'
        ],

        data() {
            return {
                show: false,
                newPublication: true,
                video: {
                    file: ''
                },
                publication: {
                    title: '',
                    description: '',
                    project_id: null,
                    entrypoint: false,
                    publication_id: null,
                    publicationable: {
                        type: 'video',
                    }
                },
                active: false,
            }
        },

        mounted() {
            this.$eventBus.$on('editPublicationInModal', this.editPublication)
            this.$eventBus.$on('newChildPublicationInModal', this.newChildPublication)
            this.$eventBus.$on('newPublicationInModal', this.openModal)
            this.publication.entrypoint = this.entrypoint
            this.publication.project_id = this.project_id
        },

        watch: {
            show: function(newVal, oldVal) {
                if (newVal == true) {
                    setTimeout(() => this.$refs.input.focus(), 100);
                }
            }
        },

        computed: {
        },

        methods: {
            storePublication() {
                if (this.newPublication) {
                    this.storeNewPublication()
                    return
                }
                this.updatePublication()
            },

            updatePublication() {
                var home = this;
                axios.patch('/api/publication/' + this.publication.id, {
                    publication: home.publication
                })
                    .then( response => {
                        window.location.href = '/project/' + this.project_id + '/edit'
                    } )
            },

            storeNewPublication() {
                var home = this
                var formData = new FormData();
                formData.append('file', this.video.file)
                formData.append('publication', JSON.stringify(this.publication))
                axios.post('/api/publication', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then( response => {
                        this.$eventBus.$emit('addedPublication', response.data)
                        window.location.href = '/project/' + this.project_id + '/edit'
                        this.resetModal
                    });
            },

            deletePublication(publication) {
                var home = this
                axios.delete('/api/publication/' + publication.id)
                    .then( response => {
                        window.location.href = '/project/' + this.project_id
                    } )
            },

            focusMyElement(e) {
                this.$refs.titleInput.focus()
            },

            resetModal() {
                this.show = false
            },

            openModal() {
                this.show = true
            },

            newChildPublication(parentpublication) {
                this.publication.publication_id = parentpublication.id
                this.show = true
            },

            editPublication(publication) {
                this.newPublication = false
                this.publication = publication
                this.show = true
            },

            onFileChange(e) {
                this.video.file = e.target.files[0]
            }
        }
    }
</script>

