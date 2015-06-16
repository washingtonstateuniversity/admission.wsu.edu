/*
function inspire() {
    $('.inspire li').textillate();
}
*/

(function($){
	
	$(document).ready( function() {

		$("#info dt").on("click", function() {
			$(this).parents("#info").toggleClass("opened");
		});
			
	});

})(jQuery);