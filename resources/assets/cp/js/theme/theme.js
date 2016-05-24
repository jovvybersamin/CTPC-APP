'use strict';

if(typeof window.$ === undefined || typeof window.jQuery === undefined){
	throw new Error('Control Panel theme needs jQuery');
}

$.Theme = {};

$.Theme.options = {
	animationSpeed:500,
	iconLeft:'icon-chevron-left',
	iconDown:'icon-chevron-down'
};


$(function() {
	_init();
	$.Theme.tree('.nav-main');
});


function _init(){

	// TODO Update this tree plugin.
	// Date 5-24-2016
	$.Theme.tree = function(menu){

		var _this = this;
		var animationSpeed = $.Theme.options.animationSpeed;
		var iconLeft = $.Theme.options.iconLeft;
		var iconDown = $.Theme.options.iconDown;

		$('li.has-sub a',$(menu)).on('click', function(e){

			var $this = $(this);
			var nextElement = $this.next();
			if(nextElement.is('ul') && nextElement.is('ul.nav-open')){
				e.preventDefault();
				nextElement.slideUp(animationSpeed, function(){
					nextElement.removeClass('nav-open');
				});

				var liParent = nextElement.parent('li.has-sub');
				liParent.removeClass('active');
				// liParent.find('span.icon').removeClass(iconDown).addClass(iconLeft);
			}
			else if( nextElement.is('ul')  && !nextElement.is('ul.nav-open')){
				e.preventDefault();
				// Now lets get the parent menu to close the open item.
				var parent = $this.parents('ul').first();
				// Close all open menus within the parent.
				var ul = parent.find('ul.nav-open').slideUp(animationSpeed);
				// Remove the nav-open class from the parent.
				ul.removeClass('nav-open');
				// Get the parent li
				var liParent = $this.parent('li.has-sub');

				// Open the target menu and add nav-open class.
				nextElement.slideDown(animationSpeed, function(){
					nextElement.addClass('nav-open');
					parent.find('li.active').removeClass('active');
						  // .find('span.icon')
						  // .removeClass(iconDown)
						  // .addClass(iconLeft);

					liParent.addClass('active');
					// liParent.find('span.icon')
					// 	    .removeClass(iconLeft)
					// 	    .addClass(iconDown);

				});
			}
		});

	}

}
