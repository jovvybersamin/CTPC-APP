// Message Components.
module.exports = {
	props:['messages'],
	computed:{
		hasMessages:function(){
			return _.size(this.messages);
		}
	}
}
