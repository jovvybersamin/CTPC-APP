require('./app.globals');

new Vue({
	el:'#app',
	data:{
		navVisible: false,
		errors:[],
		messages:[]
	},

	components:{
		'app-error':require('./components/common/errors'),
		'app-message':require('./components/common/messages'),
		'assets-browser':require('./components/assets/browser/browser'),
		'user-form':require('./components/forms/user'),
		'user-listing':require('./components/listings/users'),
		'video-form':require('./components/forms/video'),
		'video-listing':require('./components/listings/videos'),
		'video-category-form':require('./components/forms/video_category'),
		'video-category-listing':require('./components/listings/video_categories'),
		'business-category-form':require('./components/forms/business_category'),
		'business-categories-listing':require('./components/listings/business_categories')
	},

	ready:function(){
		var self = this;

		this.$on('show.errors', function( errors ) {
			self.errors = errors;
		});


		this.$on('show.messages', function( messages)
		{
			self.messages = messages;
		});

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

