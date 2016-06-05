module.exports = {


	post:function(uri,form){
		return App.sendForm('post',uri,form);
	},

	put:function(uri,form){

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
				form.finishProcessing();
				fulfill(response);
			}, function( response ){
				reject( response );
				form.busy = false;
				form.errors.set( response );
			});

		});
	}

}
