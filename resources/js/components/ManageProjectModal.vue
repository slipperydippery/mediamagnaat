<template>
    <portal to="project">
        <div class="fixed overflow-y-auto top-0 left-0 w-full h-full bg-gray-300" v-show="show" ref="portal" @click.self="resetModal">
            <div class="max-w-sm rounded overflow-hidden lg:shadow-lg lg:border mx-auto mt-10 pt-2 pb-2 bg-white">
                <div class="relative px-6 py-4">
                    <button class="absolute top-0 right-0 mr-4 text-gray-800 hover:text-red-800" @click="resetModal">
                        <i class="material-icons">
                            close
                        </i>
                    </button>
                    <div class="font-bold text-xl mb-6 text-center">New Project</div>
                    <div class="block mb-3 text-gray-700 text-sm font-bold">
                        <label class="block mb-2" for="input">Project name</label>
                        <input
                            id="input"
                            name="input"
                            type="text"
                            ref="input"
                            class="form-input mt-1 block w-full"
                            placeholder="Give your project a recognizable name"
                            required
                            v-model="project.title"
                            @input="toSlug"
                            @keydown.esc="resetModal"
                        >
                        <label class="block my-2" for="input">slug</label>
                        <span class="block h-4"> {{ project.slug }} </span>

                        <label class="block mb-2 mt-4">
                            <span class="text-gray-700">Description</span>
                            <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="A short description, you can build this out later." v-model="project.description"></textarea>
                        </label>
                    </div>
                    <div class="flex mt-6">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" v-model="project.public" >
                            <span class="ml-2">Public</span>
                        </label>
                    </div>
                    <button type="submit" class="block w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5" @click="storeProject">
                        <span v-if="newProject">
                            Create Project
                        </span>
                        <span v-else>
                            Update Project
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </portal>
</template>

<script>
    export default {
        name: "ManageProjectModal",

        props: [
            'slugs'
        ],

        data() {
            return {
                show: false,
                newProject: true,
                project: {
                    title: '',
                    slug: '',
                    description: '',
                    public: false,
                },
                active: false,
            }
        },

        mounted() {
            this.$eventBus.$on('editProjectInModal', this.editProject)
            this.$eventBus.$on('newProjectInModal', this.openModal)
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
            storeProject() {
                if (this.newProject) {
                    this.storeNewProject()
                    return
                }
                this.updateProject()
            },

            updateProject() {
                var home = this;
                axios.patch('/api/project/' + this.project.id, {
                    project: home.project
                })
                    .then( response => {
                        home.resetModal()
                    } )
            },

            storeNewProject() {
                var home = this;
                axios.post('/api/project', {
                    project: home.project
                })
                    .then( response => {
                        this.$eventBus.$emit('addedProject', response.data);
                        home.resetModal()
                    });
            },

            focusMyElement(e) {
                this.$refs.titleInput.focus()
            },

            resetModal() {
                this.project = {
                    title: '',
                    slug: '',
                    description: '',
                    public: false
                }
                this.show = false

            },

            openModal() {
                this.show = true
            },

            editProject(project) {
                this.newProject = false
                this.project = project
                this.show = true
            },

            toSlug() {
                this.project.slug = this.slugify(this.project.title)
                var slug = this.slugify(this.project.title)
                var addendum = 1
                while(this.slugs.map( slug => slug.slug ).includes(this.project.slug)){
                    this.project.slug = slug + '-' + addendum
                    addendum++
                }
            },

            slugify(string) {
                const a = 'àáâäæãåāăąçćčđďèéêëēėęěğǵḧîïíīįìłḿñńǹňôöòóœøōõőṕŕřßśšşșťțûüùúūǘůűųẃẍÿýžźż·/_,:;'
                const b = 'aaaaaaaaaacccddeeeeeeeegghiiiiiilmnnnnoooooooooprrsssssttuuuuuuuuuwxyyzzz------'
                const p = new RegExp(a.split('').join('|'), 'g')

                return string.toString().toLowerCase()
                  .replace(/\s+/g, '-') // Replace spaces with -
                  .replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
                  .replace(/&/g, '-and-') // Replace & with 'and'
                  .replace(/[^\w\-]+/g, '') // Remove all non-word characters
                  .replace(/\-\-+/g, '-') // Replace multiple - with single -
                  .replace(/^-+/, '') // Trim - from start of text
                  .replace(/-+$/, '') // Trim - from end of text
            }
        }
    }
</script>

