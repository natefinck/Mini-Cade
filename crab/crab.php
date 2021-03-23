<?php 
session_start();
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset = "utf-8">
	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Istok+Web&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="crabStyle.css">
	<title>
		Mini Arcade!
	</title>

	<script>

	</script>  

</head>
<body>
	<div class="header">
		<img src="../login_signup/img/gameController.png" alt="" class="logo" style="height: 50px;">
		<a href="../index.php"><h1>Mini Arcade!</h1></a>
		<div class="directory">
			<?php 
                if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
					echo <<<END
                        <span><a href="../login_signup/logout.php">Log out</a></span>
                    END;
                } else {
                    echo <<<END
                        <span><a href="../login_signup/login.php">Log in</a></span>
                        <span><a href="../login_signup/signup.php">Sign up</a></span>   
                    END;
                }
            ?>
		</div>
	</div>

	<h1 class="gameTitle">Crab Race!</h1>

	<div class="gameContainer" id="gameContainer">
		<div class="crabContainer">
			<img src="img/blueCrab.png" alt="" class="crab" id="blueCrab" style="height: 50px;">
			<img src="img/redCrab.png" alt="" class="crab" id="redCrab" style="height: 50px;">
			<img src="img/yellowCrab.png" alt="" class="crab" id="yellowCrab" style="height: 50px;">
			<img src="img/greenCrab.png" alt="" class="crab" id="greenCrab" style="height: 50px;">
		</div>
		<div class="startContainer" id="startContainer">
			<h1>Crab Race Game!</h1>
			<p style="margin: 5px;">Bet on a crab and watch them race to the water!</p>
			<div class="startButton" onclick="start()">Start</div>
		</div>
		<div class="doneContainer" id="doneContainer">
			<h1 id="whoWon"></h1>
			<div class="playAgain" onclick="playAgain()">Play again</div>
		</div>
	</div>

	</body>
	<script src="crab.js"></script>  
</html>
