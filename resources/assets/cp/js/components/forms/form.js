module.exports = {

	data:function(){
		return {
			isNew:true,
			formReady:false,
			headerTitle:'',
		}
	},

	ready:function(){

	},

	methods:{
		whenReady: function(callback){
			var self = this,
			url = window.location.href;

			this.$http.get(url).then(function(response){
				var data = response.data;
				self.isNew = (data.type == 'create') ? true : false;
				callback( data );
				self.ajax.method = data.type;
				self.formReady = true;
			}).catch(function(error){

			});
		}

	},



}
