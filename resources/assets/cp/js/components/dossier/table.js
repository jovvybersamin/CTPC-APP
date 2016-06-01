// component

module.exports = {

	template:require('./table.template.html'),

	props:['options','items','columns'],

	data: function(){
		return {

		}
	},

	components:{

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

	computed:{

		hasItems: function(){
			return this.items.length;
		},

		hasHeader: function(){
			return this.options.hasHeader;
		}

	},


	ready: function(){

	},

	methods:{



	}


}
