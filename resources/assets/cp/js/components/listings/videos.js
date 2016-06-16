module.exports = {

	mixins:[Dossier],

	data:function(){
		return {
			ajax:{
				get:cp_url('videos/get'),
				delete:''
			},
			tableOptions:{
				hasHeader:true,
				hasCheckbox:false,
				sortCol:'name',
				sortOrder:'asc',
				partials:{
					actions:'',
					cell:`
						<a v-if="$index == 0" href="{{ item.edit_url }}">
							<span class="">
								{{ item.name }}
							</span>
						</a>
					`
				}
			}
		}
	},


	ready:function(){
		this.addActionPartial();
	},


	methods:{

		addActionPartial:function(){
			var str = '';

				str += '<li><a href="{{ item.edit_url }}">Edit</a></li>';
				str += `
					<li class="warning">
						<a href="#" click.prevent="call('deleteItem',item.id)">Delete</a>
					</li>
				`;

			this.tableOptions.partials.actions = str;
		}

	}




}
