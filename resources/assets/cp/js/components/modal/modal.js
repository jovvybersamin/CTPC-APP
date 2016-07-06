module.exports = {

	template:require('./modal.template.html'),

	props:{
		show:{
			type:Boolean,
			required:true,
			default:false
		},
		full:{
			type:Boolean,
			required:false,
			default:false
		},
		class:{
			required:false,
			default:function(){
				return {};
			}
		},
		loading:Boolean,
		saving:Boolean
	},

	methods:{
		close:function(){
			this.show = false;
		}
	},

	computed:{
		classes:function(){

			var defaults = {
				'modal-full':this.full
			};

			var classes = {};

			if(typeof this.class === 'string'){
				_.each(this.class.split(' '),function(e){
					classes[e] = true;
				});
			} else {
				classes = this.class;
			}

			return _.extend(defaults,classes);
		}
	},


	ready:function(){

	}

}
