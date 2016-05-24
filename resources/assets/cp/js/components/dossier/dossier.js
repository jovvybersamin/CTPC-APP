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
	}

}
