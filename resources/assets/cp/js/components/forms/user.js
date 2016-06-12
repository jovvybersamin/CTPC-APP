module.exports = {
	mixins:[Form],
	data:function(){
		return {
			form:{
				primary:'user',
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
				method:'store',
				store:cp_url('users'),
				update:cp_url('users/update'),
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
			self.form.ready = true;
		this.whenReady(function( data ){
			console.log( data );
			self.form.user.set( data.user );

			if(data.user !== null){
				self.ajax.update = cp_url('users/' + data.user.username);
			}

			self.form.roles = data.roles;

			return true;
		});

	},

	methods:{
		save:function(){
			var method = this.ajax.method;
			// Either POST,PUT or DELETE
			App[method](this.ajax[method],this.form.user).then(function( response ){
				window.location = response.path;
			});
		}
	}
}
