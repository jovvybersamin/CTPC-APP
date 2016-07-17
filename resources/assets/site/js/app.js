require('./app.globals');

$(document).ready(function(){
	new Vue({
		el:'#app',

		components:{
			'video-app':require('./components/video/video')
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

