window.AppFormType = {
	Extend:'extend',
	Each:'each'
};

window.AppForm = function( data , type ){
	var form = this;

	this.type = type;
	this.data = {};
	this.busy = false;
	this.successfull = false;
	this.errors = new AppErrors();

	$.extend(this.data,data);

	this.set = function( data ){

		if(this.type === undefined || this.type === null || this.type === AppFormType.Extend){
			if(data !== null){
				_.extend(this.data,data);
			}
		}else if(this.type === AppFormType.Each){
			if(data !== null){
				var self = this;
				_.each(data,function(value,key){
					if(_.has(self.data,key)){
						self.data[key] = value;
					}
				});
			}
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

