<template>
    <portal to="publication">
        <div class="fixed overflow-y-auto top-0 left-0 w-full h-full bg-gray-300" v-show="show" ref="portal" @click.self="resetModal">
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

                        <label class="block mb-2 mt-3" for="input">Video</label>
                        <input type="file" class="form-control" v-on:change="onVideoChange" accept=".mp4">
                        <div class="mt-3">Gekozen bestand: {{ video.file ? video.file.name : '' }}</div>

                        <label class="block mb-2 mt-3" for="input">Video thumbnail</label>
                        <input type="file" class="form-control" v-on:change="onThumbnailChange" accept=".jpg, .png">
                        <div class="mt-3">Gekozen bestand: {{ thumbnail.file ? thumbnail.file.name : '' }}</div>

                    </div>
                    <button type="submit"
                            class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5"
                            @click="storePublication"
                            v-if=" ! uploading"
                    >
                        <span v-if="newPublication">
                            Create Publication
                        </span>
                        <span v-else>
                            Update Publication
                        </span>
                    </button>
                    <button class="block w-full bg-blue-200 text-white font-bold py-2 px-4 rounded mt-5"
                            disabled
                        v-else
                    >
                        Uploading...
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
            'project_id',
            'project_slug',
        ],

        data() {
            return {
                show: false,
                newPublication: true,
                video: {
                    file: {
                        name: ''
                    }
                },
                thumbnail: {
                    file: {
                        name: ''
                    }
                },
                publication: {
                    title: '',
                    description: '',
                    project_id: null,
                    project_slug: null,
                    entrypoint: false,
                    publication_id: null,
                    publicationable: {
                        type: 'video',
                    }
                },
                active: false,
                uploading: false,
            }
        },

        mounted() {
            this.$eventBus.$on('editPublicationInModal', this.editPublication)
            this.$eventBus.$on('newChildPublicationInModal', this.newChildPublication)
            this.$eventBus.$on('newPublicationInModal', this.openModal)
            this.publication.entrypoint = this.entrypoint
            this.publication.project_id = this.project_id
            this.publication.project_slug = this.project_slug
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
                this.uploading = true;
                if (this.newPublication) {
                    this.storeNewPublication()
                    return
                }
                this.updatePublication()
            },

            updatePublication() {
                var updateFormData = new FormData();
                updateFormData.append('videofile', this.video.file)
                updateFormData.append('thumbnail', this.thumbnail.file)
                updateFormData.append('publication', JSON.stringify(this.publication))
                console.log(updateFormData)
                axios.post('/api/updatepublication/' + this.project_slug, updateFormData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then( response => {
                        window.location.href = '/project/' + this.project_slug + '/edit'
                    } )
            },

            storeNewPublication() {
                var formData = new FormData();
                formData.append('videofile', this.video.file)
                formData.append('thumbnail', this.thumbnail.file)
                formData.append('publication', JSON.stringify(this.publication))
                axios.post('/api/publication', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'accept': 'application/json',
                        'Accept-Language': 'en-US,en;q=0.8',
                    }
                })
                    .then( response => {
                        this.$eventBus.$emit('addedPublication', response.data)
                        window.location.href = '/project/' + this.project_slug + '/edit'
                        this.resetModal
                    })
                    .catch( error => {
                        console.log('error here')
                    } )
            },

            deletePublication(publication) {
                var home = this
                axios.delete('/api/publication/' + publication.id)
                    .then( response => {
                        window.location.href = '/project/' + this.project_slug
                    } )
            },

            focusMyElement(e) {
                this.$refs.titleInput.focus()
            },

            resetModal() {
                this.show = false
                this.newPublication = true
                this.video = {
                    file: {
                        name: ''
                    }
                }
                this.thumbnail = {
                    file: {
                        name: ''
                    }
                }
                this.publication = {
                    title: '',
                    description: '',
                    project_id: null,
                    project_slug: null,
                    entrypoint: false,
                    publication_id: null,
                    publicationable: {
                        type: 'video',
                    }
                }
                this.active = false
                this.publication.entrypoint = this.entrypoint
                this.publication.project_id = this.project_id
                this.publication.project_slug = this.project_slug
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
                this.video.file.name = publication.publicationable.link
                this.thumbnail.file.name = publication.publicationable.thumbnail
                this.show = true
            },

            onVideoChange(e) {
                this.video.file = e.target.files[0]
            },

            onThumbnailChange(e) {
                this.thumbnail.file = e.target.files[0]
            },
        }
    }
</script>

