require('./app.globals');

$(document).ready(function(){
	new Vue({
		el:'#app',

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

