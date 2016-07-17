// component

module.exports = {

	template:require('./table.template.html'),

	props:['options'],

	data: function(){
		return {
			items:[],
			columns:[],
			sortCol:this.options.sortCol || null,
			sortOrder:this.options.sortOrder || 'asc',
			sortOrders:{},
			search:'',
			sortOrders:{}
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
		this.items = this.$parent.items;
		this.columns = this.$parent.columns;

		this.setSortOrders();
	},

	beforeCompile:function(){
		var self = this;
		_.each(this.options.partials, function(value,key){
			self.$options.partials[key] = value;
		});
	},

	computed:{

		hasItems: function(){
			return this.$parent.hasItems;
		},

		hasHeader: function(){
			return this.options.hasHeader;
		},

		computedSearch: function(){
			return this.search;
		},

		computedSortCol: function(){
			return this.sortCol;
		},

		computedSortOrder: function(){
			return this.sortOrders[this.sortCol];
		}

	},

	methods:{
		call: function(method){
			// Call any method from parent component.
			var args = Array.prototype.slice.call(arguments,1);
			this.$parent[method].apply(this,args);
		},

		setSortOrders:function(){
			var sortOrders = {};
			_.each(this.columns, function( column ){
				sortOrders[column] = 1;
			});
			sortOrders[this.sortCol] = (this.sortOrder === 'asc') ? 1 : -1;
			this.sortOrders = sortOrders;
		},

		sortBy: function(column){
			if(this.sortCol == column){
				this.sortOrders[column] = this.sortOrders[column] * -1;
			}
			this.sortCol = column;
			return this.sortOrders[column];
		}

	}


}
