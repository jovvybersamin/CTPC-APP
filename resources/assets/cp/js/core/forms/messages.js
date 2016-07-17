// Error Components.
module.exports = {
	props:['messages'],

	computed:{

		hasMessages:function(){
			return this.messages.length;
		},

		flatten:function(){
			return _.flatten(_.toArray(this.messages));
		}

	}
}
