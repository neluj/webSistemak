<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="zIndex.php">Home</a></li>
                        <li><a href="zseeXMLQuenstions.php">Quizzes</a></li>   
                        <li><a href="zCredits.php">Credits</a></li>  
                    </ul>                   
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                         	session_start();
                            if ( $_SESSION['ErabiltzaileMota']=='IRAKASLEA') {
								include 'navbar.php';
							}else{
								header('Location: zSignIn.php');
							}                       
                         ?>
                         
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        
        
        
    </head>
    
    <body>
    
    
<?php
	//session_start();
	//$linki= new mysqli("mysql.hostinger.es", "u360778608_root", "123456",  "u360778608_quiz");
	$linki = new mysqli("localhost", "root",  "", "quiz");
	$erabiltzailea = $_SESSION['username'];
	
	if($linki->connect_errno){
		echo "Errorea datu basera konektatzen".$linki->connect_error;
	}
	else{
		
		$sqli="SELECT * FROM galderak";
		$emaitza=$linki->query($sqli);
		if(!($emaitza)){
			echo"erabiltzailea: ".$erabiltzailea;
			echo "erabiltzailearen galderak aurkitzen errorea ". $linki->close();
		}
		else{
			echo '<table class="table table-striped" ><tr><th>#</th><th>Egilea</th><th>Gaia</th><th>Galdera</th><th>Erantzuna</th><th>Zailtasuna</th><th>Aukerak</th></tr>';
			while($row = $emaitza->fetch_assoc()){
				echo ('<tr><td>'.$row['GalderaZenbakia'].'</td><td>'.$row['EgilearenEposta'].'</td><td>'.$row['Gaia'].'</td><td>'.$row['GalderarenTestua'].'</td><td>'.$row['ErantzunTestua'].'</td><td>'.$row['Zailtasuna'].'</td>'  .     '<td><button id="editatuBotoia" name="editatuBotoia" class="btn btn-warning"  data-toggle="modal" onclick="editatuIrakasle('.$row["GalderaZenbakia"].')"><span class="glyphicon glyphicon-pencil"></span></button></td>' .
				'</td><tr><tr><tr><tr><tr>');
			}
		
	}
}
?>
	
	
<script>   
	
	function editatuIrakasle(zbk){
			window.location.href= ("zInsertQuestion.php?zenbakia="+zbk);	
	}

</script>

	

    </body>
</html>