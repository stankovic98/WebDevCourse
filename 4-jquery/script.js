function main() {
	
	function updateOutput() {
		$("iframe").contents().find("html").html("<html><head><style>" + $("#cssPanel").val() 
		+ "</style></head><body>" + $("#htmlPanel").val() + "</body></html>");
	}
	
	
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
	
	updateOutput();
	
	$("#htmlPanel").on("change keyup paste", function() {
		updateOutput();
	});
	$("#cssPanel").on("change keyup paste", function() {
		updateOutput();
	});
	
	
}