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

	<link rel="stylesheet" type="text/css" href="style.css">
	<title>
		Mini Arcade! Sign In
	</title>

	<script>

	</script>  

</head>
	<body>
		<img class="curve" src="img/curve.png">
		<img class="controller" src="img/gameController.png">
		<h1 class="getInGame">Get in the game</h1>
		<h4 class="miniCade">Mini-Cade</h4>
		<div class="loginContainer">
			<h2 class="title">Sign In</h2>
			<p class="newHere">New here? <a href="signup.php">Sign Up!</a></p>
			<div style="padding-left: 20px">
				<?php 
				echo <<<END
				<form method="post" action="$_SERVER[PHP_SELF]">
					<div class="username">
						<p>Username:</p>
						<input type="text" name="username" autofocus pattern="[a-zA-Z0-9!@#$%^*_|]{6,25}"/>
					</div>
					<div class="password">
						<p>Password:</p>
						<input type="password" name="password"/>
					</div>
					<input type="submit" value="Join the Fun" class="submitButton"/>
				</form>
				END;
				?>
			</div>
		</div>
	</body>
</html>

<?php 

if (isset($_POST['username']) && isset($_POST['password'])) {
	login();
}

function login() {
	$dataBase = connectDB();

	$username = mysqli_real_escape_string($dataBase, $_POST['username']);
	$password = mysqli_real_escape_string($dataBase, $_POST['password']);
	$query  = " SELECT * FROM users WHERE user_id = '" . $username . "';";

	$result = mysqli_query($dataBase, $query);
	$row = mysqli_fetch_array($result);

	if ($result->num_rows == 1) {
		if($row[2] == $password) {
			$_SESSION["personId"] = $row[0];
			$_SESSION["username"] = $row[1];
			$_SESSION["password"] = $row[2];
			$_SESSION["name"] = $row[3];
			$_SESSION["email"] = $row[4];
			$_SESSION["admin"] = $row[5];
			
			header("Location: /FINAL_PROJECT");
		} else {
			echo <<<END
				<div class="loginError">Please enter a valid username and password.</div>
			END;
			
		}
	}


	mysqli_close($dataBase);
}

 ?>