var dino = document.getElementById("dino");
var block = document.getElementById("block");
var count = 0;

function jump(){
	if(dino.classList != "jump"){
		dino.classList.add("jump");

	}
	setTimeout(function(){
		dino.classList.remove("jump");
	},500);
	count = count + 1;
}

document.body.onkeyup = function(e){
	if(e.keyCode == 13){
		jump();
	}
}

var checkDead = setInterval(function(){
	var dinoTop = parseInt(window.getComputedStyle(dino).getPropertyValue("top"));

	var blockLeft = parseInt(window.getComputedStyle(block).getPropertyValue("left"));

	if(blockLeft<50 && blockLeft>0 && dinoTop>=360){
		//loses
		block.style.animation = "none";
		document.getElementById("youLose").classList.add("show");
		count = count - 1;
		document.cookie="count="+count;
	}
},10);

function playAgain() {
	location.reload();
}

function start() {
	document.getElementById("block").classList.add("blockAnimation");
	document.getElementById("startContainer").classList.add("hide");
}