module.exports = {
	mixins:[Form],
	data:function(){
		return {
			form:{
				primary:'user',
				user:new AppForm({
					id:0,
					name:'',
					username:'',
					password:'',
					password_confirmation:'',
					email:'',
					profile:'',
					about:'',
					roles:[],
					categories:[]
				}),
				roles:[],
				categories:[]
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
		},
		'user-categories':{
			props:['categories','userCategories'],
			ready:function(){

			},

			computed:{
				hasCategories:function(){
					return (this.categories.length > 0) ? true : false;
				},

				hasUserCategories:function(){
					return (this.userCategories.length > 0) ? true : false;
				}
			},

			methods:{
				addCategory:function(category){
					this.userCategories.push(category);
					var idx = _.indexOf(this.categories,category);
					this.categories.splice(idx,1);
				},

				removeCategory:function(category){
					this.categories.push(category);
					var idx = _.indexOf(this.userCategories,category);
					this.userCategories.splice(idx,1);
				}

			}
		},


	},

	ready:function(){
		var self = this;
			self.form.ready = true;
		this.whenReady(function( data ){

			self.form.user.set( data.user );

			if(data.user !== null){
				self.ajax.update = cp_url('users/' + data.user.username);
			}

			self.form.roles = data.roles;
			self.form.categories = data.categories;

			return true;
		});

	},

	methods:{
		save:function(){
			var method = this.ajax.method;
			var self = this;
			// Either POST,PUT or DELETE
			App[method](this.ajax[method],this.form.user).then(function( response ){
				if(response.path !== undefined){
					window.location = response.path;
				}
			},function( response ){
				self.$dispatch('show-error',response);
			});
		}
	}
}
