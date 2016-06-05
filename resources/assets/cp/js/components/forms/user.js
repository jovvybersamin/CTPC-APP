module.exports = {
	mixins:[Form],
	data:function(){
		return {
			form:{
				user:new AppForm({
					name:'',
					username:'',
					email:'',
					about:'',
					roles:[]
				}),
				roles:[]
			},
			ajax:{
				method:'create',
				create:cp_url('users'),
				update:'',
				delete:''
			}
		}
	},

	components:{
		'user-roles':{
			props:['roles','userRoles'],

			ready:function(){
				var userRoles = [];
				_.each(this.userRoles, function(value){
					userRoles.push(value.id);
				});
				this.userRoles = userRoles;
			},

			methods:{
				select:function(role){
					if(this.userRoles.indexOf(role.id) === -1){
						this.userRoles.push(role.id);
					}else{
						this.userRoles.$remove(role.id);
					}
				},
				selected:function( id ){
					if(this.userRoles !== undefined || this.userRoles !== null){
						return this.userRoles.indexOf(id) > -1;
					}
				}
			}
		}
	},

	ready:function(){
		var self = this;

		this.whenReady(function( data ){
			self.form.user.set( data.user );
			self.form.roles = data.roles;
		});

	},

	methods:{
		save:function(){
			App.post(this.ajax[this.ajax.method],this.form.user).then(function( response ){
				window.location = response.data.path;
			});
		}
	}

}
