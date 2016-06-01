// Mixins
module.exports = {

	data: function(){
		return {
			loading:true,
			items:[],
			columns:[],
			search:null
		}
	},

	components: {
		'dossier-table':require('./table')
	},

	ready: function(){
		this.getItems();
	},

	methods: {

		getItems: function(){
			this.$http.get(this.ajax.get).then(function( response ){
				var data = response.data,
					status = response.status,
					request = response.request;

				this.items = data.items;
				this.columns = data.columns;

			}).catch(function(){
				alert('There was a problem retrieving the data. Check your logs.');
			});
		}

	}

}
