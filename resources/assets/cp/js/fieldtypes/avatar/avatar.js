module.exports = {

	template:require('./avatar.template.html'),

	props:['profile','user','name','id','class'],

	data:function(){
		return {
			loading:false
		};
	},

	ready:function(){

	},

	computed:{

		photoAvatar:function(){
			if(this.profile != ''){

				return site_url('avatars/' + this.profile);
			}
			return '';
		}
	},
	methods:{
		file:function(e){
			e.preventDefault();
			var self = this;
			var files = this.$els.avatar.files;
			var data = new FormData();
			data.append('profile',files[0]);
			data.append('user',this.user);
			this.profile = files[0];

			this.loading = true;

			this.$http.post(api_url('user/changeAvatar'),data).then(function( response ){
				var data = response.data;
				var status = response.status;
				if(status != 422) {
					self.profile = data.avatar
				}else{

				}
				self.loading = false;
			});

		},

		changeAvatar:function(){
			$('.avatar-upload').click();
		}
	}

}
