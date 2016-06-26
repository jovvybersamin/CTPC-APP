module.exports = {
	template:require('./select2.template.html'),

	props:['selected','options','name','key','value','defaultText'],

	computed:{

		hasOptions:function(){
			return this.options !== null;
		},



	},

	ready:function(){

		var self = this;

		$('.'+this.name).select2().on('change',function(){
			self.selected = this.value;
		});

	},


	methods:{

		isSelected:function(option){
			var key = this.key;
			if(_.isArray(this.selected)){

			}else{
				return option[key] == this.selected;
			}
		}
	},

	watch:{
		options:function(options,oldVal){
			if(_.where(options,{id:0}).length <= 0){
				if(this.selected === null){
					this.selected = "0";
				}
				options.unshift({id:0,name:this.defaultText});
			}
		}
	}

}
