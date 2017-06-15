<?php

	$host=$_SERVER['SERVER_NAME'];

	if ($host=="localhost"){

		$esteka = mysqli_connect("localhost", "root",  "", "quiz");
	}else{
		$esteka = mysqli_connect("mysql.hostinger.es", "u360778608_root", "123456",  "u360778608_quiz");
	}

?>
