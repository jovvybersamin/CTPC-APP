module.exports = {

	mixins:[],

	template:require('./browser.template.html'),

	props:{
		label:String,
		placeholder:String,
		container:String,
		path:String,
		selectedAsset:''
	},

	data:function(){
		return {
			assets:[],
			folders:[],
			folder:{},
			loading:true,
			showModalBrowser:false,
		}
	},

	ready:function(){
		var self = this;

		this.loadAssets();

		this.$on('path.updated',function(newPath){
			this.updatedPath(newPath);
		});

		this.$on('asset.selected',function(asset){
			self.selectedAsset = asset;
			self.showModalBrowser = false;
			self.path = '/';
			self.folder = {};
		});

	},

	methods:{

		select:function(){
			this.path = '/';
			this.showModalBrowser = true;
		},

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

	}

}
