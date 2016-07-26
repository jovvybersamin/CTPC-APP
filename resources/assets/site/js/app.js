require('./app.globals');

$(document).ready(function(){
	new Vue({
		el:'#app',

		components:{
			'video-player':require('./components/video/video'),
			'video-sidebar-listing':require('./components/videos/sidebar/listing')
		},

		data:{
			navVisible:false,
			errors:[],
			messages:{}
		},

		methods:{
			toggleNav:function(){
				this.navVisible = !this.navVisible;
			}
		}
	});
});

