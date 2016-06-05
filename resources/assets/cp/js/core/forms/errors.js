window.AppErrors = function(){
	this.errors = {};

	/**
	 * Clear the errors.
	 *
	 */
	this.forget = function(){
		this.errors = {};
	}

	/**
	 *
	 * Set the errors.
	 *
	 */
	this.set = function(errors){
		if(typeof errors === 'object'){
			this.errors = errors;
		}else{
			this.errors = {'field':['Error!']};
		}
	};
}
