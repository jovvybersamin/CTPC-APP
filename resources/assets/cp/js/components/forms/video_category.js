module.exports = {
	mixins:[Form],
	data:function(){
		return {
			form:{
				primary:'category',
				category:new AppForm({
					id:'',
					name:''
				})
			},
			ajax:{
				method:'store',
				store:cp_url('videos/categories'),
				update:cp_url('videos/categories/update')
			}
		}
	},

	ready:function(){
		console.log('here');
		var self = this;
		this.whenReady(function( data ){
			self.form.category.set( data.category );
			if(data.category !== null){
				self.ajax.update = cp_url('videos/categories/' + data.category.id);
			}
			return true
		});
	},


	methods:{
		save:function(){
			var method = this.ajax.method;
			App[method](this.ajax[method],this.form.category).then(function( response ){
				if(response.path !== undefined){
					window.location = response.path;
				}
			});
		}
	}
}
