module.exports = {

	template:require('./browser.template.html'),

	props:{
		container:String,
		uuid:String,
		path:String
	},

	data:function(){
		return {
			assets:[],
			folders:[],
			folder:{},
			loading:true
		}
	},

	ready:function(){
		this.loadAssets();
	},

	methods:{

		loadAssets:function(){
			this.$http.post(cp_url('assets/browse'),{
				container:this.container,
				path:this.path
			}).then( function( response ){
				var data = response.data;
				this.assets = data.assets;
				this.folder = data.folder;
				this.folders = data.folders;
				this.loading = false;
			});
		}
	}

}
