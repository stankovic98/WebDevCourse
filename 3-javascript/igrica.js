
function main(){
	
	setInterval(makeNewObject, 1000);

	

	
	
	function makeNewObject() {
		
		var item = document.createElement("div");
		item.className = "shape";
		document.body.appendChild(item);
		
		

		var div = item.style;
		
		div.borderRadius = 0;
		
		var pos_X = Math.floor(Math.random() *700)+1;
		var pos_Y = Math.floor(Math.random() *300)+1;
		
		var color = getRandomColor();
		
		var shape = Math.floor(Math.random() *3);
		
		switch (shape)
		{
			case 0:
				var a = randomStranica();
				div.height = a;
				div.width = a;
				break;
			case 1:
				var a = randomStranica();
				var b = randomStranica();
				div.height = a;
				div.width = b;
				break;
			case 2:
				var a = randomStranica();
				div.height = a;
				div.width = a;
				a = Math.floor(a/2);
				div.borderRadius = a+"px";
				break;
		}
		
		div.left = pos_X;
		div.top = pos_Y;
		
		now = new Date();
		div.display = "block";
		div.backgroundColor = color;
		
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

