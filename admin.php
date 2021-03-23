<?php 
session_start();
include ("connectToDB.inc");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Page</title>
	</head>

<body>

<?php
if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
	if($_SESSION['admin'] == "no") {
		echo "<h1>You aren't allowed on this page -- go play some games!";
		echo "<a href='index.php'><button>Back to home page</button></a>";
	} else {
		header("Location: /FINAL_PROJECT/admin/adminAuth.php");
	}
} else {
	header("Location: /FINAL_PROJECT/login_signup/login.php");
}

?>
</body>

<html>