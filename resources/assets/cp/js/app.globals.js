require('./core/bootstrap');

// Mixins.
window.Dossier = require('./components/dossier/dossier');
window.Form = require('./components/forms/form');


// Plugins
Vue.use(require('./plugins/resource_url'));

// Components
Vue.component('modal',require('./components/modal/modal'));
Vue.component('assets-listing',require('./components/assets/listing/listing'));
Vue.component('assets-folder-editor',require('./components/assets/modals/folder-editor'));

//fieldtypes
Vue.component('asset-field-browser',require('./fieldtypes/assets/browser/browser'));
Vue.component('avatar',require('./fieldtypes/avatar/avatar'));
