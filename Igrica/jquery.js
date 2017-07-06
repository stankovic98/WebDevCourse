function main(){
	
	$("#pocetna").hide();
	
	var trajanjeIgre = 5 * 1000;
	var respawnItema = 1 * 1000;
	var trajanjeItema = 2 * 1000;
	var counter = 0;
	var vrijeme = trajanjeIgre / 1000;
	var igraTraje = true;
	
	var igra = setInterval(makeNewObject, respawnItema);
	setTimeout(prekiniIgru, trajanjeIgre, igra);
	
	setTimeout(prekidTimera, trajanjeIgre);
	
	function prekidTimera() {
		$("#t").html("0"); 
		igraTraje = false;
	}
	var int2 = setInterval(updateTime, 1000, int2);
	function updateTime(interval) {
		if(igraTraje) {
			vrijeme--;
			$("#t").html(vrijeme);
			
		}
	}
	
	$("#button").click(function() {
		location.reload();
	});
	
	function makeNewObject() {
		
		var item = $("body").append("<div class='shape'></div>");
		$(".shape").css("display", "block");
		
		$(".shape").click(function() {
			counter++;
			$(".shape").css("display", "none");
			$("#i").html(counter);
		});
			
		var pos_X = Math.floor(Math.random() *700)+1;
		var pos_Y = Math.floor(Math.random() *300)+100;
		
		var color = getRandomColor();
		
		$(".shape").css({
			top: pos_Y, 
			left: pos_X
		});
		
		$(".shape").css("background-color", color);
		
		var shape = Math.floor(Math.random() *3);
		
		switch (shape)
		{
			case 0:
				var a = randomStranica();
				$(".shape").height(a);
				$(".shape").width(a);
				break;
			case 1:
				var a = randomStranica();
				var b = randomStranica();
				$(".shape").height(a);
				$(".shape").width(b);
				break;
			case 2:
				var a = randomStranica();
				$(".shape").height(a);
				$(".shape").width(a);
				$(".shape").css("border-radius", "50%");
				break;
		}
		
	
	}
	
	function prekiniIgru(interval) {
		clearInterval(interval);
		$("#gameOver").css("display","block");
		$("#bodovi").html(counter);
		
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