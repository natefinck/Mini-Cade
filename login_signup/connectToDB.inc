<?php

function connectDB(){
	$dbConnection = mysqli_connect("sql304.epizy.com", "epiz_27230291", "Y0ZMGhqudgNVY", "epiz_27230291_minicade");
	if (mysqli_connect_errno()){
		die(mysqli_connect_error());
	}
	return $dbConnection;
}


?>