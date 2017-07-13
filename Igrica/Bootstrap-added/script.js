
function getTopResults(htmlId) {
	var htmlKod = '<div class="container col-md-5 center-block" id="listaE"><ul class="list-group  ">';
	$.ajax({
		type: "POST",
		url: "getTopResult.php",
		success: function (data) {

			var dataArr = JSON.parse(data);
			dataArr.forEach(function (element) {
				htmlKod += '<li class="list-group-item justify-content-between" name="prvi" ><span>' + element.name + '</span><span class="badge badge-default badge-pill">' + element.score + '</span></li>';
			}, this);
			htmlKod += '</ul></div>';
			$(htmlId).html(htmlKod);
		}
	});

}

function sendData(user, pts) {

	var myData = {
		name: user,
		bodovi: pts
	};

	$.ajax({
		type: "POST",
		url: "dataBase.php",
		data: myData,
		success: function (data) {
			console.log("meseg sent");
			console.log(data);
			getTopResults("#top10");
		}
	});

}
function main() {
	if ($("#name").val() == "") {
		$("#mymodal").modal("toggle");
		$("#cancle").click(function () {
			$("#mymodal").modal("toggle");
		});
		return;
	}

	$("#pocetna").hide();
	var user = $("#name").val()
	$("#playerName").html(user);
	$("#igra").toggle();
	$(".progress-bar").width("100%");
	var originalWidth = $(".progress-bar").width();

	var trajanjeIgre = 5 * 1000;
	var respawnItema = 0.5 * 1000;
	var trajanjeItema = 2 * 1000;
	var counter = 5;
	var trajanjeIgreSEC = trajanjeIgre / 1000;
	var vrijeme = trajanjeIgreSEC;
	var igraTraje = true;
	var postotakPomicanjaItem = 0.11; //brojevi od 0 do 1
	var postotakMinusBodovi = 0.22;

	var igra = setInterval(makeNewObject, respawnItema);
	setTimeout(prekiniIgru, trajanjeIgre, igra);



	setTimeout(prekidTimera, trajanjeIgre);

	function prekidTimera() {
		$(".progress-bar").css("width", "0");
		igraTraje = false;
	}
	var int2 = setInterval(updateTime, 1000, int2);
	function updateTime(interval) {
		if (igraTraje) {

			vrijeme--;
			var postotak = Math.floor((vrijeme / trajanjeIgreSEC * 100));
			progressBar(postotak, $('.progress-bar'), originalWidth);

		}
	}

	$("#restart").click(function () {
		location.reload();
	});

	function makeNewObject() {

		var animirano = false;

		var item = $("<div class='shape'></div>").appendTo("#room");
		var minusBodovi = false;
		item.css("display", "block");
		item.bomba = false;
		if (Math.random() < postotakMinusBodovi) {
			item.css("border", "15px dotted red");
			item.bomba = true;
			animirano = true;
		}
		item.click(function () {
			if (item.bomba) {

				counter--;
				$("#bodovi").html(counter);

			} else {
				counter++;
				item.css("display", "none");
				$("#bodovi").html(counter);
			}
		});





		var shape = Math.floor(Math.random() * 3);

		switch (shape) {
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

		var pos_X = Math.floor(Math.random() * $("#room").width() - 60);
		var pos_Y = Math.floor(Math.random() * $("#room").height() - 65);

		var color = getRandomColor();
		item.css("background-color", color);

		item.css({
			top: pos_Y,
			left: pos_X
		});

		/*
		item.hover(function() {
			
			if(Math.random() < postotakPomicanjaItem && !animirano) {
				item.animate({
					left: "+=300px"
				}, 100);
				animirano = true;
			}	
		});
		
		item.hover(function() {
			
			if(Math.random() < postotakPomicanjaItem && !animirano) {
				item.animate({
					top: "+=300px"
				}, 100);
				animirano = true;
			}	
		});
		
		item.hover(function() {
			
			if(Math.random() < postotakPomicanjaItem && !animirano) {
				item.animate({
					width: "60px",
					height: "40px",
					left: "-220px"
				}, 100);
				animirano = true;
			}	
		});
		*/
		function destroyObject() {
			item.hide();
		}

		setTimeout(destroyObject, trajanjeItema)

	}

	function prekiniIgru(interval) {
		clearInterval(interval);
		$("#modal").modal("show");
		$("#score").html(counter);


		sendData(user, counter);


		$.bootstrapGrowl("You score is stored in database!", {
			offset: { from: 'top', amount: 10 },
			type: 'success',
			align: 'right',
			width: 'auto',
			allow_dismiss: false
		});


		/*
		$.post('igrica.php', { name: 'antonio' }, function (returnedData) {
			// do something here with the returnedData
			console.log(returnedData);
		});
		*/

	}

	function progressBar(percent, $element, originalWidth) {

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
		return Math.floor(Math.random() * 200) + 40;
	}
}

$(document).ready(function () {
	getTopResults("#pocetnaTop10");

});

function toggleHighscore() {
	$("#pocetnaTop10").toggle();
}