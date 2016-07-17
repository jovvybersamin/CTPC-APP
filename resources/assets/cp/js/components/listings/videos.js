module.exports = {

	mixins:[Dossier],

	data:function(){
		return {
			ajax:{
				get:cp_url('videos/get'),
				delete:cp_url('videos/delete')
			},
			tableOptions:{
				hasHeader:true,
				hasCheckbox:false,
				sortCol:'title',
				sortOrder:'asc',
				partials:{
					actions:'',
					cell:`
						<a v-if="$index == 0" href="{{ item.edit_url }}">
							<span class="status status-{{ (item.status) ? 'live' : 'hidden' }}"></span>
							{{ item[column] }}
						</a>

						<template v-else>
							<span v-if="$index == 2" class="text-center status status-{{ (item.featured) ? 'live' : 'hidden' }} "></span>
							<span v-else>
								{{ item[column] }}
							</span>
						</template>
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
						<a href="" @click.prevent="call('deleteItem',item.id)">Delete</a>
					</li>
				`;

			this.tableOptions.partials.actions = str;
		}

	}




}
