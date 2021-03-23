for(var i = 0; i < 70; i++) {
	document.writeln("<div class='checkContainer'>");
	document.writeln('<div class="boxWrapper"><input type="checkbox" id="box' + i + '" class="box"/> <label for="box' + i + '" class="checkmark"></label></div>');
	document.writeln("</div>")
}

document.cookie="count=null";

function countChecks() {
	let count = 0;
	for(var i = 0; i < 50; i++) {
		let checkbox = document.getElementById("box" + i);
		if(checkbox.checked) {
			count++;
		}
	}
	return count;
}

function start() {
	document.getElementById("startContainer").classList.add("hide");
	var time = 10;
	var interval = setInterval(function(){
		document.getElementById("timer").innerHTML = time;
		time--;
		if(time == 0) {
			clearInterval(interval);
			var count = countChecks(); 
			document.cookie="count="+count;
			document.getElementById("doneContainer").classList.add("show");
		}
	},1000)
}
