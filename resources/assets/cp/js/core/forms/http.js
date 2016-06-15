module.exports = {

	store:function(uri,form){
		return App.post(uri,form);
	},

	update:function(uri,form){
		return App.put(uri,form);
	},

	post:function(uri,form){
		return App.sendForm('post',uri,form);
	},

	put:function(uri,form){
		return App.sendForm('put',uri,form);
	},

	delete:function(uri,form){

	},

	/**
	 * Send the form data to back-end server and process it.
	 *
	 *
	 */
	sendForm:function(method,uri,form){

		return new Promise(function(fulfill,reject){
			form.startProcessing();
			Vue.http[method](uri,form.data).then(function( response ){
				fulfill( response.data );
				form.finishProcessing();
			}, function( response ){
				form.busy = false;
				form.errors.set( response.data );
				reject( response.data );
			});

		});
	}

}
