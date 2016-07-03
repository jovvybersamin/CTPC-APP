module.exports = {

	template:require('./listing.template.html'),

	props:{
		name:String,
		container:String,
		path:String,
		assets:{
			type:Array,
			required:false,
			default:function(){
				return null;
			}
		},
		folders:{
			type:Array,
			required:false,
			default:function(){
				return null;
			}
		},
		folder:{
			type:Object,
			required:false,
			default:function(){
				return null;
			}
		}
	},


	data:function(){
		return {
			loading:true,
			creatingFolder:false
		}
	},

	computed: {

		hasParent: function(){
			if( ! this.folder) {
				return false;
			}
			return this.folder.folder_path;
		},

		hasItems: function(){
			return this.folders.length || this.assets.length;
		}

	},

	ready:function(){
		if(!this.assets) {
			// No assets ? what should we do.
			// can we not just call the loadAssets of the parent component (asset-browser)?
		}else{
			this.loadingComplete();
		}
	},

	methods:{

		loadingComplete:function(){
			this.loading = false;
			//
		}

	}


}