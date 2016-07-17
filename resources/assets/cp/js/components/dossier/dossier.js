module.exports = {

	data: function(){
		return {
			items:[],
			columns:[],
			loading:true
		}
	},

	components:{
		'dossier-table':require('./table')
	},

	ready:function(){
		this.getItems()
	},

	computed:{
		hasItems:function(){
			return this.items !== null && !this.loading;
		}
	},

	methods:{

		getItems:function(){
			this.$http.get(this.ajax.get).then(function( response ){
				var data = response.data,
					status = response.status,
					request = response.request;

				this.columns = data.columns;
				this.items = data.items;
				this.loading = false;

			}).catch(function(){
				alert('There was a problem retrieving the data. Check your logs.');
			});
		},

		deleteItem:function(id){
			var self = this;

			swal({
				type:'warning',
				title:'Are you sure?',
				text:"This item will be deleted.",
				showCancelButton:true,
				confirmButtonText:"Yes, I'm sure."
			},function(){

				if(arguments.length === 1){

					self.$http.delete(self.ajax.delete,{
						ids:[id]
					}).then(function(response){
						var data = response.data;

						if(data.success){
							var item = _.findWhere(self.items,{id:id});
							var index = _.indexOf(self.items,item);
							self.items.splice(item,1);
						}

					});

				}
			});
		}

	}


}
