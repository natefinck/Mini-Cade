window.addEventListener("load", () => {
	const canvas = document.querySelector("#canvas"); 
	const ctx = canvas.getContext("2d");
	console.log(ctx);

	//Resizing 
	//canvas.height = 500;//window.innerHeight;  
	canvas.height = window.innerHeight;  
	//const container = document.getElementsByClassName("gameContainer")[0];
	//container.height = 500;//window.innerHeight;  
	canvas.width = window.innerWidth;  

	//window.addEventListner('resize, '); add event listerner so it resizes

	//variables 
	let painting = false; 
 
	function startPos(e) {
		painting = true;
		draw(e); 
	}

	function finishedPos() {
		painting = false; 
		ctx.beginPath(); 
	}

	function draw(e){
		if (!painting) return; 
		ctx.lineWidth = 5; 
		ctx.lineCap = "round";
		//ctx.strokeStyle = "#dddddd"

		var x = e.clientX; //-320
		var y = e.clientY //-180

		ctx.lineTo(x, y);
		ctx.stroke();

		ctx.beginPath(); 
		ctx.moveTo(x, y);

		//if onclick on a certain div 
	}
	

		var colorpicker = document.getElementById("drawingpic");
		//ctx.strokeStyle = colorpicker;
		colorpicker.addEventListener("change", function(){ 

		ctx.strokeStyle = colorpicker.value; });
	

	//EventListeners 
	canvas.addEventListener("mousedown", startPos);
	canvas.addEventListener("mouseup", finishedPos);
	canvas.addEventListener("mousemove", draw);
});