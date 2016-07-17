// Error Components.
module.exports = {
	props:['errors'],

	computed:{

		hasErrors:function(){
			return _.size(this.errors);
		},

		flatten:function(){
			return _.flatten(_.toArray(this.errors));
		}

	}
}
