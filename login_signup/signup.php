<?php include("connectToDB.inc");?>
<!DOCTYPE html>

<html>
<head>
	<meta charset = "utf-8">
	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Istok+Web&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="styleSignUp.css">
	<title>
		Mini Arcade! Sign Up
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
			<h2 class="title">Sign Up</h2>
			<p class="beenHere">Been here before? <a href="login.php">Sign In!</a></p>
			<div style="padding-left: 20px">
				<?php
				echo <<<END
				<form method="post" action="$_SERVER[PHP_SELF]">
					<div class="fullName">
						<p>Full Name:</p>
						<input type="text" name="fullName" autofocus />
					</div>
					<div class="email">
						<p>Email:</p>
						<input type="text" name="email" />
					</div>
					<div class="username">
						<p>Username:</p>
						<input type="text" name="username" pattern="[a-zA-Z0-9!@#$%^*_|]{6,25}"/>
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

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['fullName']) && isset($_POST['email'])) {
	signUp();
	header("Location: /FINAL_PROJECT/login_signup/login.php");
}

function signUp() {
	$dataBase = connectDB();

	$q1 = " INSERT INTO users(user_id, password, name, email) VALUES (";
	$q2 = "', '";
	$q3 = "');";
	$username = "'" . mysqli_real_escape_string($dataBase, $_POST['username']) . $q2;
	$password = mysqli_real_escape_string($dataBase, $_POST['password']) . $q2;
	$fullName = mysqli_real_escape_string($dataBase, $_POST['fullName']) . $q2;
	$email = mysqli_real_escape_string($dataBase, $_POST['email']) . $q3;


	$query = $q1 . $username . $password . $fullName . $email;

	$result1 = mysqli_query($dataBase, $query);

	mysqli_close($dataBase);
}
?>








