
module.exports = {

	mixins:[Dossier],

	data:function(){
		return {
			ajax:{
				get:cp_url('videos/categories/get'),
				delete:''
			},
			tableOptions:{
				hasHeader:true,
				sortCol:'name',
				sortOrder:'asc',
				partials:{
					'actions':'',
					'cell':`
						<a v-if="$index === 0" href="{{ item.edit_url }}">
							<span class="">
								{{ item.name }}
							</span>
						</a>
					`
				}
			}
		};
	},


	ready:function(){

	}



}
