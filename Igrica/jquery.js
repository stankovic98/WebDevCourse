function main(){
	
	$("#pocetna").hide();
	
	var trajanjeIgre = 5 * 1000;
	var respawnItema = 1 * 1000;
	var trajanjeItema = 2 * 1000;
	var counter = 0;
	var vrijeme = trajanjeIgre / 1000;
	var igraTraje = true;
	
	var igra = setInterval(makeNewObject, respawnItema);

	
	function makeNewObject() {
		
		var item = $("body").append("<div class='shape'></div>");
		$(".shape").css("display", "block");
		
		$(".shape").click(function() {
			counter++;
			$(this).css("display", "none");
			$("#i").html(counter);
		});
			
		var pos_X = Math.floor(Math.random() *700)+1;
		var pos_Y = Math.floor(Math.random() *300)+100;
		
		var color = getRandomColor();
		
		$(".shape").css({top: pos_Y, left: pos_X});
		
		var shape = Math.floor(Math.random() *3);
		
		
		
	}
	
	
	
	function getRandomColor() {
	  var letters = '0123456789ABCDEF';
	  var color = '#';
	  for (var i = 0; i < 6; i++) {
		color += letters[Math.floor(Math.random() * 16)];
	  }
	  return color;
	}
	
	function randomStranica() {
		return Math.floor(Math.random()*200)+100;
	}
}