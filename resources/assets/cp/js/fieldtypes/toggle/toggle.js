module.exports = {

	template:require('./toggle.template.html'),

	props:['name','data','config'],

	computed:{
		isOn:function(){
			return this.data === true || this.data === 1;
		}
	},

	methods:{
		toggle:function(){
			this.data = !this.data;
		}
	}

}
