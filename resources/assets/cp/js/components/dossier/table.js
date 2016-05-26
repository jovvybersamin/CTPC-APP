// component

module.exports = {

	template:require('./table.template.html'),

	props:['options'],

	data: function(){
		return {
			items:[],
			columns:[]
		}
	},

	components:{

	},

	computed:{


		hasItems: function(){
			return this.$parent.hasItems;
		}

	},

	ready:function(){
		this.items = this.$parent.items;
		this.columns = this.$parent.columns;
	},

	methods:{


	}


}
