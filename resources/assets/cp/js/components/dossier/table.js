// component

module.exports = {

	template:require('./table.template.html'),

	props:['options','search','columns','items'],

	data: function(){
		var sortOrders = {};
		return {
			sortOrders:sortOrders
		}
	},

	components:{
		'search':{
			props:['term'],
			template:`
				<input type="text" v-model="term" @keyup.esc="reset" placeholder="Search" class="search" >
			`,
			methods:{
				reset:function(){
					this.term = '';
				}
			}
		}
	},

	partials:{

		'cell':`
			<a v-if="$index === 0">
				<span class="status status-{{ (item.status) ? 'live' : 'hidden' }}"
					  :title=""
				></span>
				{{ item[column] }}
			</a>
			<span v-else>
				{{ item[column] }}
			</span>
			`
	},

	ready: function(){
		console.log(this.$data);

		this.setSortOrders();
	},

	computed:{

		hasItems: function(){
			return this.items.length;
		},

		hasHeader: function(){
			return this.options.hasHeader;
		},

		computedSearch: function(){
			return this.search;
		}

	},

	methods:{
		setSortOrders:function(){
			console.log(this.columns);
			_.each(this.columns, function( column ){
				console.log('FUCK!');
			});
		}
	}


}
