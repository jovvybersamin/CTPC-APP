require('./core/bootstrap');

// Mixins.
window.Dossier = require('./components/dossier/dossier');
window.Form = require('./components/forms/form');

// Components
Vue.component('assets-listing',require('./components/assets/listing/listing'));
