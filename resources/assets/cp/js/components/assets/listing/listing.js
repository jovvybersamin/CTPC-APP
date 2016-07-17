  module.exports = {

	template:require('./listing.template.html'),

	props:{
		name:String,
		container:String,
		path:String,
		allowActions:true,
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
			assetQueue:[],
			loading:true,
			creatingFolder:false,
			showFolderEditor:false,
			folderModalPath:'',
			plugin:null
		}
	},

	partials:{

		'actions-asset':`
			<div class="btn-group" v-if="allowActions">
					<button type="button" class="btn-more dropdown-toggle"
							 data-toggle="dropdown" aria-haspopup="true"
							 aria-expanded="true" aria-expanded="false">
						<i class="icon icon-dots-three-vertical"></i>
					</button>
					<ul class="dropdown-menu">
						<li><a href="">Edit</a></li>
						<li class="warning"><a href="" @click.prevent='deleteAsset(asset)'>Delete</a></li>
					</ul>
			</div>
		`,

		'actions-folder':`
			<div class="btn-group" v-if="allowActions">
					<button type="button" class="btn-more dropdown-toggle"
							 data-toggle="dropdown" aria-haspopup="true"
							 aria-expanded="true" aria-expanded="false">
						<i class="icon icon-dots-three-vertical"></i>
					</button>
					<ul class="dropdown-menu">
						<li class="warning"><a href="" @click.prevent="deleteFolder(folder)">Delete</a></li>
					</ul>
			</div>
		`

	},


	computed: {

		hasParent: function(){
			if( ! this.folder) {
				return false;
			}
			return this.folder.parent_path;
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

		this.$on('folder.created',function( folder ){
			this.folders.push( folder );
		});

		this.$on('folder.updated',function( folder ){
		});

	},

	methods:{

		createFolder:function(){
			this.showFolderEditor = true;
			this.creatingFolder = true;
			this.folderModalPath = this.path;
		},

		deleteFolder:function( folder ){

			var url = cp_url('assets/folders/delete'),
				self = this;

			swal({
				type:'warning',
				title:'Are you sure?',
				text:"This folder will be deleted.",
				showCancelButton:true,
				confirmButtonText:"Yes, I'm sure."
			},function(){
				this.loading = true;

				self.$http.delete(url,{
					container:self.container,
					path:folder.path
				}).then(function( response ){
					var data = response.data;
					if( data.success ){
						var item = _.findWhere(self.folders,{path:folder.path}),
							index = _.indexOf(self.folders,item);
						self.folders.$remove(folder);
						self.folders.slice(index,1);
					}
					self.loadingComplete();
				});

			});
		},

		deleteAsset:function(asset){
			var self = this;

			var url = cp_url('assets/delete');

			swal({
				type:'warning',
				title:'Are you sure?',
				text:"This file will be deleted.",
				showCancelButton:true,
				confirmButtonText:"Yes, I'm sure."
			},function(){
				this.loading = true;

				self.$http.delete(url,{
					container:self.container,
					folder:self.folder.path,
					paths:[asset.path]
				}).then(function( response ){
					var data = response.data;
					if( data.success ){
						self.assets.$remove(asset);
					}
					self.loadingComplete();
				});

			});
		},

		editFolder:function(path){
			this.showFolderEditor = true;
			this.createFolder = false;
			this.folderModalPath = path;
		},

		goToFolder:function(path){
			this.$dispatch('path.updated',path);
		},

		selectAsset:function(asset){
			this.$dispatch('asset.selected',asset.url);
		},

		loadingComplete:function(){
			this.loading = false;
			this.$dispatch('asset-listing.loading-complete');
			this.bindUploader();
		},

		fileIcon:function(extension){
			return resource_url('img/fieldtypes/' + extension + '.png');
		},

		bindUploader:function(){
			var self = this;
			var $uploader = $(this.$el);

			$uploader.dmUploader({
				url:cp_url('assets'),
				extraData:{
					container:self.container,
					folder:self.path
				},

				onNewFile:function(id,file){
					self.assetQueue.push({
						id:id,
						basename:file.name,
						extension:file.name.split('.').pop(),
						percent:0
					});
				},

				onUploadProgress:function(id,percent){
					var asset = _.findWhere(self.assetQueue,{id:id});
					asset.percent = percent;
				},

				onUploadSuccess:function(id,data){
					self.assets.unshift(data.asset);

					var asset = _.findWhere(self.assetQueue,{id:id});
					var index = _.indexOf(self.assetQueue,asset);
					self.assetQueue.splice(index,1);
				},

				onUploaderError:function(id,message){

				}
			});
		}

	}


}
