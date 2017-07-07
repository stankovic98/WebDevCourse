function main(){
	
	$("#pocetna").hide();
	var user = $("#name").val()
	$("#playerName").html(user);
	$("#igra").toggle();
	$(".progress-bar").width("100%");
	var originalWidth = $(".progress-bar").width();
	
	var trajanjeIgre = 5 * 1000;
	var respawnItema = 1 * 1000;
	var trajanjeItema = 2 * 1000;
	var counter = 0;
	var trajanjeIgreSEC = trajanjeIgre / 1000;
	var vrijeme = trajanjeIgreSEC;
	var igraTraje = true;
	
	var igra = setInterval(makeNewObject, respawnItema);
	setTimeout(prekiniIgru, trajanjeIgre, igra);
	
	
	
	setTimeout(prekidTimera, trajanjeIgre);
	
	function prekidTimera() {
		$(".progress-bar").css("width", "0");
		igraTraje = false;
	}
	var int2 = setInterval(updateTime, 1000, int2);
	function updateTime(interval) {
		if(igraTraje) {
			

			
			vrijeme--;
			var postotak = Math.floor(( vrijeme/trajanjeIgreSEC*100));
			progressBar(postotak, $('.progress-bar'), originalWidth);
			
			
			
		}
	}
	
	$("#restart").click(function() {
		location.reload();
	});
	
	function makeNewObject() {
		
		
		var item = $( "<div class='shape'></div>" ).appendTo( "#room" );
		item.css("display", "block");
		
		item.click(function() {
			counter++;
			item.css("display", "none");
			$("#bodovi").html(counter);
		});
			
		
		
		
		
		var shape = Math.floor(Math.random() *3);
		
		switch (shape)
		{
			case 0:
				var a = randomStranica();
				item.height(a);
				item.width(a);
				item.addClass("animation-target1");
				break;
			case 1:
				var a = randomStranica();
				var b = randomStranica();
				item.height(a);
				item.width(b);
				item.addClass("animation-target2");
				break;
			case 2:
				var a = randomStranica();
				item.height(a);
				item.width(a);
				item.css("border-radius", "50%");
				item.addClass("animation-target3");
				break;
		}
		
		var pos_X = Math.floor(Math.random() * $("#room").width()-60);
		var pos_Y = Math.floor(Math.random() * $("#room").height()-65);
		
		var color = getRandomColor();
		item.css("background-color", color);
		
		item.css({
			top: pos_Y, 
			left: pos_X
		});
		function destroyObject() {
			item.hide();
		}
	
		setTimeout(destroyObject, trajanjeItema)
	
	}
	
	function prekiniIgru(interval) {
		clearInterval(interval);
		$("#modal").modal("show");
		$("#score").html(counter);
		
	}
	
	function progressBar(percent, $element,originalWidth) {
		
		var progressBarWidth = percent * originalWidth / 100;
		$element.animate({ width: progressBarWidth }, 500);
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
		return Math.floor(Math.random()*200)+10;
	}
}