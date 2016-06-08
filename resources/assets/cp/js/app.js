require('./core/bootstrap');

// Mixins.
window.Dossier = require('./components/dossier/dossier');
window.Form = require('./components/forms/form');

new Vue({
	el:'#app',
	data:{
		navVisible: false,
		errors:[]
	},

	components:{
		'app-error':require('./components/common/errors'),
		'user-form':require('./components/forms/user'),
		'user-listing':require('./components/listings/users')
	},

	methods:{
		toggleNav: function(){
			this.navVisible = !this.navVisible;
		}
	},

	events:{
		'errors-changed':function( errors ){
			this.errors = errors;
		}
	}
});

