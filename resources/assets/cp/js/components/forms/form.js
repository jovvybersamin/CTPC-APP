module.exports = {
	props:['errors'],
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

				self.isNew = (data.type == 'store') ? true : false;
				if(callback( data ) === true){
					self.ajax.method = data.type;
					self.formReady = true;
					self.headerTitle = data.headerTitle;
				}else{
					alert('There was an error in the callback function in ready hook of the component. </br> Try to return a true to fix this.');
				}
			}).catch(function(error){
				alert('There was something wrong with this form. Error: ' + error);
			});
		}
	},

	watch:{
		'form[form.primary].errors.errors':function(newVal,oldVal){
			this.$dispatch('errors-changed',this.form[this.form.primary].errors.flatten());
		}
	}




}
