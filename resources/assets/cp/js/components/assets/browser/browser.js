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


		this.$on('path.updated',function(newPath){
			this.updatedPath(newPath);
			this.pushState();
		});

		this.$on('folder.created',function( folder ){
			this.folders.push( folder );
		});
	},

	methods:{

		loadAssets:function(){
			this.loading = true;

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
		},

		updatedPath:function(newPath){
			this.path = newPath;
			this.loadAssets();
		},

		pushState:function(){
        	var path = (this.path === '/') ? '' : this.path;
            window.history.pushState({ path: this.path }, '', cp_url('assets/browse/' + this.container  + path));
		}
	},



}
