require('./core/bootstrap');

new Vue({
	el:'#app',
	data:{
		navVisible: false
	},
	methods:{
		toggleNav: function(){
			this.navVisible = !this.navVisible;
		}
	}
});

