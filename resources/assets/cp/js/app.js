require('./app.globals');

new Vue({
	el:'#app',
	data:{
		navVisible: false,
		errors:[]
	},

	components:{
		'app-error':require('./components/common/errors'),
		'assets-browser':require('./components/assets/browser/browser'),
		'user-form':require('./components/forms/user'),
		'user-listing':require('./components/listings/users'),
		'video-form':require('./components/forms/video'),
		'video-listing':require('./components/listings/videos'),
		'video-category-form':require('./components/forms/video_category'),
		'video-category-listing':require('./components/listings/video_categories')
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

