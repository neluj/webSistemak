
<?php

	include 'konexioa.php';

$email = $_POST['email'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

	if (!$esteka)
	{ 	
		echo "Hutsegitea MySQLra konetatzerakoan". PHP_EOL;
		echo "error depurazio akatsa: " . mysqli_connect_error().PHP_EOL;
		exit;
	}

	switch($_POST['espe']){
	case 'best':	
			$inter=$_POST['besterik'];
		break;
	default:
			$inter=$_POST['espe']; 
	}
    $pass=$_POST['passwd'];
	$passkript = sha1($pass);
	$mota = 'IKASLEA';
	$sql = "INSERT INTO erabiltzaile 
		(ErabiltzaileMota ,Izena, Abizena1, Abizena2,Posta, Pasahitza, Telefonoa ,Espezialitatea,Interesak) VALUES
		
		('$mota' ,
		'$_POST[name]' ,
		'$_POST[lastname1]'	,
		'$_POST[lastname2]',
		'$_POST[email]' ,
		'$passkript' ,
		'$_POST[telnum]' ,
		 '$inter' ,
		'$_POST[interesak]' )";

	$ema=mysqli_query($esteka,$sql);

	if (!$ema){
		die('Errorea query-a gauzatzerakoan: '.mysqli_error($esteka));
	}

	header("Location: zIndex.php");
    die();


} else {
  echo("$email is not a valid email address");
}
mysqli_close($esteka);

?>
