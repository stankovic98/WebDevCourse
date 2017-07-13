function main() {


	var decript = "";
	var abc = [];
	$("#output").click(function () {
		var txt = $("#input").val();
		for (var i = 0; i < 26; i++) {
			if ($("#a" + i).val() == "") {
				abc[i] = $("#a" + i).data("placeholder");
			} else {
				abc[i] = $("#a" + i).val();
			}
		}
		console.log(abc);
		for (var i = 0; i < txt.length; i++) {

			for (var j = 0; j < 26; j++) {
				if (txt[i] == abc[j]) {
					decript += $("#a" + j).attr("data-placeholder");
					console.log($("#a" + j).attr("data-placeholder"));
					break;
				} else if (txt[i] == " ") {
					decript += " ";
					break;
				}
			}

		}
		console.log(decript);
		$("#output").val("");
		$("#output").val(decript);
		decript = "";
	});

}