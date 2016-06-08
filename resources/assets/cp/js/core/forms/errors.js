window.AppErrors = function(){
	this.errors = {};

	/**
	 * Clear the errors.
	 */
	this.forget = function(){
		this.errors = {};
	};


	/**
	 * Get the collection of errors.
	 */
	this.get = function(){
		return this.errors;
	};

	this.flatten = function(){
		return _.flatten(_.toArray(this.errors));
	}

	/**
	 * Set the errors.
	 */
	this.set = function(errors){
		if(typeof errors === 'object'){
			this.errors = errors;
		}else{
			this.errors = {'field':['Error!']};
		}
	};
}
