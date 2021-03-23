function start() {
    background = document.getElementById("gameContainer");
    background.style.backgroundPositionY = "-350px";
    background.style.transition = "10000ms";
    document.getElementById("startContainer").classList.add("hide");
    var blue = document.getElementById("blueCrab");
    var red = document.getElementById("redCrab");
    var yellow = document.getElementById("yellowCrab");
    var green = document.getElementById("greenCrab");

    // console.log(window.getComputedStyle(green).top);
    window.interval = setInterval(function(){
        getRandomSpeed(blue);
        getRandomSpeed(red);
        getRandomSpeed(yellow);
        getRandomSpeed(green);
    }, 15);
}

function getRandomSpeed(crab) {
    var top = parseFloat(window.getComputedStyle(crab).top.substring(0, window.getComputedStyle(crab).top.length-2));
    let randomInt = getRandomInt(2);
    crab.style.top = top - randomInt + "px";
    if(top <= 0) {
        document.getElementById("doneContainer").classList.add("show");
        if(crab.id == "blueCrab") {
            document.getElementById("whoWon").textContent = "Blue Won!";
        } else if(crab.id == "redCrab") {
            document.getElementById("whoWon").textContent = "Red Won!";
        } else if(crab.id == "yellowCrab") {
            document.getElementById("whoWon").textContent = "Yellow Won!";
        } else if(crab.id == "greenCrab") {
            document.getElementById("whoWon").textContent = "Green Won!";
        } 
        stop();
    }
}

function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
  }

  function stop() {
      clearInterval(interval);
  }

  function playAgain() {
	location.reload();
}