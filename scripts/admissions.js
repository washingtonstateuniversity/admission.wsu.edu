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
	
	function actions_size() {
		var actions_width = $("main").width();
		$(".main-footer").css("width",actions_width);
	}
	
	$('.folded dt').click( function() { $(this).toggleClass('unfolded').next('dd').toggleClass('unfolded'); });
	
	
	$(document).ready( function() {
		
		
		$("body").addClass("ready");
		
		process_section_backgrounds();
		
		$('.drop').click( function() {
			$(this).toggleClass('dropped');
		});

		$(".action-item dt").on("click", function() {
			$(this).parents(".action-item").toggleClass("opened").siblings(".opened").removeClass("opened");
		});
		
		if ( $(".fp-section").length ) {
		
			$('main').fullpage({
				//sectionsColor: ['#f2f2f2', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff']
				fixedElements: '.main-header, .footer',
				verticalCentered: false,
				touchSensitivity: 10
			});
		
		}
		
		if ( $(".row:first-of-type").hasClass("inspiring") ) {
			
			//$("body").addClass("inspiring-lead");
		
		}
		
		$(".slide").wrapInner("<span class=\"wrap\"></span>");
		
		if ( $('[class^="id-"]').length ) {
			alert("hello");
			
			$(".etape").click(function(){
			   var get = $.grep(this.className.split(" "), function(v, i){
			       return v.indexOf('btn') === 0;
			   }).join();
			   
			});
		
		}
	
	});
	
	//$(window).on('resize', actions_size());

})(jQuery);