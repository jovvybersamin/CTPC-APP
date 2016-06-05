window.AppForm = function( data ){
	var form = this;

	this.data = {};
	this.busy = false;
	this.successfull = false;
	this.errors = new AppErrors();

	$.extend(this.data,data);

	this.set = function( data ){
		if(data !== null){
			_.extend(this.data,data);
		}
	};

	this.startProcessing = function(){
		this.errors.forget();
		this.busy = true;
		this.successfull = false;
	};

	this.finishProcessing = function(){
		this.busy = false;
		this.successfull = true;
	}

}
