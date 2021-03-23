<?php 
session_start();
include("connectToDB.inc");
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset = "utf-8">
	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Istok+Web&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="../style.css">

	<link rel="stylesheet" type="text/css" href="dinoStyle.css">

	<title>
		Mini Arcade!
	</title>

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

	<h1 class="gameTitle">Blue Jay Game!</h1>

	<div class="gameContainer">
		<img class="dino" id="dino" src="images/billy.jpg"></img>
		<div class="block" id="block"></div>
		<div class="doneContainer" id="youLose">
			<h1>You lose!</h1>
			<?php
                if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
                    echo <<<END
                    <form method="post" action="$_SERVER[PHP_SELF]">
                        <input type="submit" value="Add score to highscore table!" class="submitButton"/>
                    </form>
                    END;
                } else {
                    echo "<p>Nice Job! If you want to compete for the highest score, you'll need to log in!</p>";
                    echo "<a href='../login_signup/login.php'><div class='doneButtons'>Log in</div></a> <a href='dinosaur.php'><div class='doneButtons'>Play again</div></a>";
                }
            ?>
		</div>
		<div class="startContainer" id="startContainer">
			<h1>Blue Jay Game</h1>
			<p>Use the ENTER key to jump. Don't let Billy Blue Jay Die!</p>
			<div class="startButton" onclick="start()">Start</div>
		</div>
	</div>

	<div class="highscoreContainer">
        <h1>Highscore Table</h1>
        <?php 
            function getHighscores() {
                $dataBase = connectDB();
        
                $query = " SELECT * FROM highscore_dinosaur ORDER BY score DESC; ";
                $result = mysqli_query($dataBase, $query) or die('Query failed: '.mysqli_error($dataBase));
        
                $count = 1;
                echo "<table>";
                echo "<th></th><th>Name</th><th>Score</th>";
                while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
					extract($line);
                    echo "<tr> <td>$count. </td> <td>$name</td> <td>$score</td> </tr>";
                    $count = $count + 1;
                    if($count > 5) {
                        break;
                    }
                }
                echo "</table>";
        
                mysqli_close($dataBase);
            }
            getHighscores();
        ?>
	</div>
	</body>
	<?php 
        addHighscore();
        function addHighscore() {
            $dataBase = connectDB();
            if($_COOKIE[count] > 0) {
                $query = " INSERT INTO highscore_dinosaur (person_id, score, name) VALUES ($_SESSION[personId], $_COOKIE[count], '" . $_SESSION[name] . "') ";
            }
			$result = mysqli_query($dataBase, $query);
			setcookie("count", "", time() - 3600); 

            mysqli_close($dataBase);
        }
    ?>
	<script src="dinosaur.js"></script>  
</html>