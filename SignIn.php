<?php
	session_start();
?>

<?php
	include 'konexioa.php';
	 
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
		
		$sqlerabmota = "SELECT ErabiltzaileMota FROM erabiltzaile WHERE Posta='$posta'";
				$erabiltzailearray = $esteka->query($sqlerabmota);
				if (!$erabiltzailearray) {
    				echo 'Could not run query: ' . $esteka->error;
    				exit;
    			}
				$rowmota = $erabiltzailearray->fetch_array(MYSQL_NUM);
				$_SESSION['ErabiltzaileMota'] = $rowmota[0];
		if ( $_SESSION['ErabiltzaileMota']=='IRAKASLEA'){
			header('Location: reviewingQuizes.php');
		}else{
			header('Location: zInsertQuestion.php');	 
		}
	 } else { 
	   echo "Posta edo pasahitza ez da zuzena.";
	 
	   echo "<br><a href='layout.html'>Hasierako orrira joan</a>";
	   
	   echo " edo berriro saiatu";
	   //include('SignIn.html');
	 }
	
	 mysqli_close($esteka);
?>