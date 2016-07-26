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
			onSelect:false,
			assets:[],
			folders:[],
			folder:{},
			rootFolder:{
				parent_path:'',
				path:'/',
				title:''
			},
			loading:true,
			showModalBrowser:false,
		}
	},

	ready:function(){
		var self = this;

		this.$on('path.updated',function(newPath){
			this.updatedPath(newPath);
		});

		this.$on('asset.selected',function(asset){
			self.selectedAsset = asset;
			self.showModalBrowser = false;
			self.path = '/';
			self.folder = self.rootFolder;
		});

	},

	methods:{

		select:function(){
			this.showModalBrowser = true;
			this.loadAssets();
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
