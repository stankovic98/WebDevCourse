function main() {
	
	$( ".toggleButton" ).hover(function() {
			$( this ).addClass("highlightedButton" );
		} ,
		function() {
			$( this ).removeClass("highlightedButton" );
		}
	);
	
	$( ".toggleButton" ).click(function() {
		$(this).toggleClass("active");
		$( this ).removeClass("highlightedButton" );
		
		var panelId = $(this).attr("id") + "Panel";
		$("#" + panelId).toggleClass("hidden");
		var numberOfActivePanels = 4 - $(".hidden").length;
		$(".panel").width( ($(window).width() / numberOfActivePanels ) - 10);
		console.log($(".panel").width());
		
	});
	
	$("textarea").height($(window).height() - $("#header").height() -15);
	//$(".panel").width( ($(window).width() / 2 ) - 10);
	
	$("iframe").contents().find("html").html($("#htmlPanel").val());
	
	$("#htmlPanel").on("change keyup paste", function() {
		$("iframe").contents().find("html").html($("#htmlPanel").val());
	});
	
	
}