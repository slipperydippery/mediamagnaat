/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import PortalVue from 'portal-vue'
Vue.use(PortalVue);

import Verte from 'verte';
import 'verte/dist/verte.css';
Vue.component('verte', Verte);


import VueVideoPlayer from 'vue-video-player'

// require videojs style
import 'video.js/dist/video-js.css'
// import 'vue-video-player/src/custom-theme.css'

Vue.use(VueVideoPlayer, /* {
  options: global default options,
  events: global videojs events
} */)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('nav-template', require('./components/NavTemplate.vue').default);
Vue.component('new-project-button', require('./components/NewProjectButton.vue').default);
Vue.component('manage-project-modal', require('./components/ManageProjectModal.vue').default);
Vue.component('projects-by-user', require('./components/ProjectsByUser.vue').default);
Vue.component('edit-project-button', require('./components/EditProjectButton.vue').default);

Vue.component('new-publication-button', require('./components/NewPublicationButton.vue').default);
Vue.component('manage-publication-modal', require('./components/ManagePublicationModal.vue').default);
Vue.component('publications-tree', require('./components/PublicationsTree.vue').default);
Vue.component('publication-children', require('./components/PublicationChildren.vue').default);

Vue.component('player-container', require('./components/PlayerContainer.vue').default);
Vue.component('show-video', require('./components/ShowVideo.vue').default);

Vue.component('layout-editor', require('./components/LayoutEditor.vue').default);
Vue.component('video-display', require('./components/VideoDisplay.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.prototype.$eventBus = new Vue();

const app = new Vue({
    el: '#app',
});
