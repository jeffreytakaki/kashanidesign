(function($) { "use strict";
jQuery(document).ready(function($) {
	console.log(one_page);
	$('.header-wrapper').onePageNav({
		currentClass:'current_page_item',
		navItems: '.menu-item > a',
		easing: one_page.easing,
		scrollSpeed: parseInt(one_page.scrollSpeed),
		scrollOffset: parseInt(one_page.scrollOffset),
		changeHash: false
	});
});
})(jQuery);
