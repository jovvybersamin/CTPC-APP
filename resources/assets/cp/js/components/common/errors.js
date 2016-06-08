// Error Components.
module.exports = {
	props:['errors'],
	computed:{
		hasErrors:function(){
			return this.errors.length;
		}
	}
}
