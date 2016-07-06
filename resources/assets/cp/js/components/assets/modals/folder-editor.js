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
				update:cp_url('assets/folders/{container}/{path}')
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
			//
		},

		saveNewFolder:function(){
			var method = 'store',
				self = this;
			App[method](this.ajax[method],this.form.folder).then(function( response ){
				self.$dispatch('folder.created', response.folder );
				self.saving = false;
				self.creating = false;
			});

		},

		save:function(){
			this.saving = true;

			if(this.create){
				this.saveNewFolder();
			}else{

			}

		}

	}

}
