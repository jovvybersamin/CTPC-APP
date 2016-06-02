// Mixins
module.exports = {

	data: function(){
		return {
			loading:true,
			items:[],
			columns:[],
			search:''
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
			this.$http.get(this.ajax.get,function(data,status,request){
				this.items = data.items;
				this.columns = data.columns;
			}).error(function(){
				alert('There was a problem retrieving the data. Check your logs.');
			}).bind(this);
		}

	}

}
