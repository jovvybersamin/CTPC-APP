module.exports = {

	mixins:[Dossier],

	data:function(){
		return {
			ajax: {
				get:cp_url('users/get'),
				delete:''
			},
			tableOptions:{
				hasHeader:true
			}
		}
	}

}
