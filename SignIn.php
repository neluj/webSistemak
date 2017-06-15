<?php
	session_start();
?>

<?php
	//$esteka = mysqli_connect("mysql.hostinger.es", "u421176028_root", "123456",  "mysql_select_db");
	$esteka = mysqli_connect("localhost", "root",  "", "quiz");
	/*
	$host_db = "mysql.hostinger.es";
	$user_db = "u360778608_root";
	$pass_db = "123456";
	$db_name = "u360778608_quiz";
	$tbl_name = "erabiltzaile";*/
	 
	//$esteka = new mysqli($host_db, $user_db, $pass_db, $db_name);
	 
	 $tbl_name = "erabiltzaile";
	if ($esteka->connect_error) {
	 die("ezin izan da datu basera konektatu: " . $esteka->connect_error);
	}
	 $posta = mysqli_real_escape_string($esteka,$_POST['email']);
	 $pass = mysqli_real_escape_string($esteka,$_POST['passwdLog']);
	  
	 $passkript = sha1($pass);
	 $sql = "SELECT * FROM $tbl_name WHERE Posta = '$posta' and Pasahitza = '$passkript'";

	 $erantzuna = mysqli_query($esteka,$sql);
     $row = mysqli_fetch_array($erantzuna,MYSQLI_ASSOC);
     $active = $row['active'];
      
     $count = mysqli_num_rows($erantzuna);
	 
	 
	if ($count == 1) {    
	  
	    $_SESSION['loggedin'] = true;
	    $_SESSION['username'] = $posta;
		
		header('Location: zInsertQuestion.php');	 
	 } else { 
	   echo "Posta edo pasahitza ez da zuzena.";
	 
	   echo "<br><a href='layout.html'>Hasierako orrira joan</a>";
	   
	   echo " edo berriro saiatu";
	   //include('SignIn.html');
	 }
	
	 mysqli_close($esteka);
?>