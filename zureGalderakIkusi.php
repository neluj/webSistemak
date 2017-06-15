<?php
	session_start();
	//$linki= new mysqli("mysql.hostinger.es", "u360778608_root", "123456",  "u360778608_quiz");
	$linki = new mysqli("localhost", "root",  "", "quiz");
	$erabiltzailea = $_SESSION['username'];
	
	if($linki->connect_errno){
		echo "Errorea datu basera konektatzen".$linki->connect_error;
	}
	else{
		
		$sqli="SELECT * FROM galderak WHERE EgilearenEposta='$erabiltzailea'";
		$emaitza=$linki->query($sqli);
		if(!($emaitza)){
			echo"erabiltzailea: ".$erabiltzailea;
			echo "erabiltzailearen galderak aurkitzen errorea ". $linki->close();
		}
		else{
			echo '<table class="table table-striped" ><tr><th>#</th><th>Gaia</th><th>Galdera</th><th>Erantzuna</th><th>Zailtasuna</th><th>Aukerak</th></tr>';
			while($row = $emaitza->fetch_assoc()){
				echo ('<tr><td>'.$row['GalderaZenbakia'].'</td><td>'.$row['Gaia'].'</td><td>'.$row['GalderarenTestua'].'</td><td>'.$row['ErantzunTestua'].'</td><td>'.$row['Zailtasuna'].'</td>'  .     '<td><button id="editatuBotoia" name="editatuBotoia" class="btn btn-warning"  data-toggle="modal" onclick="editatu('.$row["GalderaZenbakia"].')"><span class="glyphicon glyphicon-pencil"></span></button></td>' .
				'</td><tr><tr><tr><tr><tr>');
			}
		
	}
}
?>
	


<script>   
	
	function editatu(zbk){
			window.location.href= ("zInsertQuestion.php?zenbakia="+zbk);	
	}

</script>