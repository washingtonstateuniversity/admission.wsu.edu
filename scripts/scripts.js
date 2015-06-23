/*
function inspire() {
    $('.inspire li').textillate();
}
*/

(function($){
	
	var process_section_backgrounds = function() {
		var $bg_sections = $('.section-wrapper-has-background');
	
		$bg_sections.each( function() {
			var background_image = $(this).data('background');
			$(this).css('background-image', 'url(' + background_image + ')' );
		});
	};
	
	$(document).ready( function() {
		
		process_section_backgrounds();

		$(".action-item dt").on("click", function() {
			$(this).parents(".action-item").toggleClass("opened").siblings(".opened").removeClass("opened");
		});
			
	});

})(jQuery);