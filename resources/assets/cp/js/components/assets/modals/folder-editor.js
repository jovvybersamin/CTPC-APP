module.exports = {

	template:require('./folder-editor.template.html'),

	props: {
		show:Boolean,
		container:String,
		path:String,
		create:{ type: Boolean, default: false }
	},

	data:function(){
		return {
			form:{
				folder:new AppForm({
					id:null,
					basename:'',
					parent:'',
					container:'',
				})
			},
			ajax:{
				method:'store',
				store:cp_url('assets/folders'),
				update:cp_url('assets/folders')
			},
			folder:{},
			loading:false,
			saving:false,
		}
	},

	ready:function(){
		this.getFolder();

	},

	methods:{

		reset:function(){

		},

		getFolder: function(){
			if(this.create){
				this.getBlankFolder();
			}else{
				this.getExistingFolder();
			}
		},

		getBlankFolder:function(){
			this.folder = {};

			var form = {
				container:this.container,
				parent:this.path
			};

			_.extend(this.form.folder.data,form);
			this.loading = false;
		},

		getExistingFolder:function(){
			var url = cp_url('assets/folders/' + this.container + this.path),
				self = this;

			this.$http.get(url).then(function( response ){
				var data = response.data;
				if(data.success){

					var form = {
						container: self.container,
						path:self.path,
						parent:data.folder.parent,
						basename:data.folder.title
					};

					_.extend(this.form.folder.data,form);
				}

				this.loading = false;
			});
		},

		saveNewFolder:function(){
			var method = 'store',
				self = this;
			App[method](this.ajax[method],this.form.folder).then(function( response ){

				self.saving = false;
				self.creating = false;
				self.show = false;

				if(response.success){
					self.$dispatch('folder.created', response.folder );
				}else{
					alert('There was an error when we are trying to create the folder.')
				}

			});

		},

		saveExistingFolder:function(){
			var method = 'update',
				self = this;
			App[method](this.ajax[method],this.form.folder).then(function( response ){
				var data = response.data;
				self.$dispatch('folder.updated',data.folder);
				self.saving = false;
				self.creating = false;
			});
		},

		save:function(){
			this.saving = true;

			if(this.create){
				this.saveNewFolder();
			}else{
				this.saveExistingFolder();
			}
		}

	}

}
