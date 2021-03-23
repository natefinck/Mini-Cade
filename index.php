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

	<link rel="stylesheet" type="text/css" href="style.css">
	<title>
		Mini Arcade!
	</title>

	<script>

	</script>  

</head>
<body>
	<div class="header">
		<img src="login_signup/img/gameController.png" alt="" class="logo" style="height: 50px;">
		<h1>Mini Arcade!</h1>
		<div class="directory">
            <?php 
                if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
					echo <<<END
                        <span><a href="login_signup/logout.php">Log out</a></span>
                    END;
                } else {
                    echo <<<END
                        <span><a href="login_signup/login.php">Log in</a></span>
                        <span><a href="login_signup/signup.php">Sign up</a></span>   
                    END;
                }
            ?>
		</div>
	</div>

	<div class="game firstGame">
		<a href="dinosaur/dinosaur.php"><h2>Blue Jay Game</h2></a>
		<p class="gameDescription">You know the game dinosaur that you can play when your wifi is out on your Google Chrome browser? Well, our game is like that only tailored to the Creighton experience. In our dinosaur-esce game, Billy BlueJay jumps over a (Creighton) blue arbitrary block, instead of a prickly ol’ cactus. Click on the game title to get your game, but still make sure that wifi is on to play our game and not Chrome’s.</p>
	</div>

	<div class="game">
		<a href="crab/crab.php"><h2>Crab Race</h2></a>
		<p class="gameDescription">A gambling game, but without the risk and remorse of losing large sums of money. Just mentally place a bet over one of our four differently colored blue, yellow, red and green crabs racing down the sandy shores to the ocean. Click on the game title to never have to set foot in a dim-lit casino again!</p>
	</div>

	<div class="game">
		<a href="drawing/drawing.html"><h2>Drawing</h2></a>
		<p class="gameDescription">Not that competitive and just want to just doodle around and conserve trees in a total hassle-free manner. In our drawing game everyone wins! Just simply click on the color and change your pen to whatever color you please. Then, let your creativity run wild! When you're done, just scrap the canvas, symbolizing the paper, by reloading the screen.</p>
	</div>

	<div class="game">
		<a href="checkBoxes/checkBoxes.php"><h2>Check Boxes</h2></a>
		<p class="gameDescription">For our competitive folks out there, let's test those hand eye coordination skills. Simply, check as many boxes as you can in the span of ten seconds. Make sure you have quite some time on your hands for this game, because it can get addicting trying to check all those boxes. Click on the title and get to clickin’ times a’tickin’!</p>
	</div>
	<div class="footer">
		<div class="pContainer">
			<p style="font-size: 24px">Designed in the Silicon Prairie</p>
			<p>Lucy Sanchez and Nate Finck</p>
			<p><span><a href="admin.php">Admin</a></span></p>
		</div>
	</div>
	</body>
</html>
