module.exports = {

	mixins:[Form],

	components:{
		'field-toggle':require('./../../fieldtypes/toggle/toggle'),
		'field-select2':require('./../../fieldtypes/select2/select2')
	},

	data:function(){
		return {
			form:{
				primary:'video',
				video:new AppForm({
					id:null,
					title:'',
					'short_description':'',
					'description':'',
					'duration':'',
					'source':'',
					'image_cover':'',
					'status':false,
					'featured':false,
					'category_id':null,
					'uploaded_by':null,
				},AppFormType.Each),
				categories:[],
				users:[]
			},
			ajax:{
				method:'store',
				store:cp_url('videos'),
				update:cp_url('videos/update')
			}
		};
	},

	ready:function(){
		var self = this;
		this.whenReady(function( data ) {

			self.form.video.set( data.video );
			self.form.categories = data.categories;
			self.form.users = data.users;

			if(data.video !== null){
				self.ajax.update = cp_url('videos/' + data.video.id);
			}
			return true
		});
	},

	methods:{

		save:function(){
			var method = this.ajax.method;
			App[method](this.ajax[method],this.form.video).then(function( response ){
				if(response.path !== undefined){
					window.location = response.path;
				}
			});
		}

	}


}
