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
	
	$('.folded dt,.toggled dt').click( function() { $(this).toggleClass('unfolded').next('dd').toggleClass('unfolded'); });
	
	$(document).ready( function() {
		
		$("body").addClass("ready");
		
		$(".home .spine-social-channels").clone().addClass("looseleaf").prependTo($(".socialize .column.one"));
		
		process_section_backgrounds();
		
		$('.drop').click( function() {
			$('.dropped').not(this).removeClass('dropped');
			$(this).toggleClass('dropped');
		});

		// Show and Hide Actions Widgets
		$(".action-item dt").on("click", function() {
			$(this).parents(".action-item").toggleClass("opened").siblings(".opened").removeClass("opened");
		});
		$(document).mouseup(function(e) {
		    var container = $(".action-item");
		    if (!container.is(e.target) && container.has(e.target).length === 0) {
		        $(".action-item.opened").removeClass("opened");
		    }
		});
		
		$(".slide").wrapInner("<span class=\"wrap\"></span>");
		
		if ( $('[class^="id-"]').length ) {
			//alert("hello");
			
			$(".etape").click(function(){
			   var get = $.grep(this.className.split(" "), function(v, i){
			       return v.indexOf('btn') === 0;
			   }).join();
			   
			});
		
		}
	
	});
	
	//$(window).on('resize', actions_size());

})(jQuery);