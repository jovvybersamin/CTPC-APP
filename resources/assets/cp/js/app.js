require('./core/bootstrap');

window.Dossier = require('./components/dossier/dossier');

new Vue({
	el:'#app',
	data:{
		navVisible: false
	},

	components:{
		'user-listing':require('./components/listings/users')
	},

	methods:{
		toggleNav: function(){
			this.navVisible = !this.navVisible;
		}
	}
});

