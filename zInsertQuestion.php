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
                            	 
                            	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
                            	{
									include 'navbar.php';
                                
                            	} else {
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
		$editatu="ez";
		if (isset($_GET['zenbakia'])){
			
			$esteka = mysqli_connect("localhost", "root",  "", "quiz");
			$galderazbk=$_GET['zenbakia'];
			$sqlgaldera="SELECT GalderaZenbakia, EgilearenEposta, Gaia, GalderarenTestua, ErantzunTestua, Zailtasuna FROM galderak WHERE galderaZenbakia='$galderazbk'";
			$galderaemaitza=$esteka->query($sqlgaldera);
			
			if(!$galderaemaitza) {
				echo("Ez da galdera aurkitu: ".$esteka->error);
			}else{
				
				$galdera = $galderaemaitza->fetch_array(MYSQLI_BOTH);
				
				$egilePosta = $galdera['EgilearenEposta'];
				
				if($egilePosta==$_SESSION['username'] || ( $_SESSION['ErabiltzaileMota']=='IRAKASLEA')){
					$editatu="bai";
					$zenbakia = $galdera['GalderaZenbakia'];
						
					$gaia = $galdera['Gaia'];
					$galderaTestua = $galdera['GalderarenTestua'];
					$erantzunTestua = $galdera['ErantzunTestua'];
					$zailtasuna = $galdera['Zailtasuna'];

				?>
					<script type="text/javascript">
					$(function() {
						$("#gaia").val("<?php echo $gaia; ?>");
						$("#galderaText").val("<?php echo $galderaTestua; ?>");
						$("#erantzunText").val("<?php echo $erantzunTestua; ?>");
						$("#zailtasuna").val("<?php echo $zailtasuna; ?>");
					})
					</script>
				<?php	
				}else{
					header("Location:zhandlingQuizes.php");
				}
			}

		}
		else if(( $_SESSION['ErabiltzaileMota']=='IRAKASLEA'))
		{
			header('Location: reviewingQuizes.php');
		}
			?>
	
	
	<div id="galderaeditatu" >

        <form <?php if($editatu=="bai"){echo "action='EditQuestion.php?zenbakia=$galderazbk'";}else{echo "action='SaveQuestion.php'";}	?>action="SaveQuestion.php" enctype="multipart/form-data" method="post" id = "galdera" name = "galdera" onSubmit = "return egiaztatu(<?php echo "$editatu";	?>)">
    
            <div class="form-group">
                <label for="gaia" class="control-label col-xs-5">Gaia :</label>
                <div class="col-xs-5">
                     <input id="gaia" name="gaia" type="text" class="form-control" placeholder="Galderaren gaia">
                </div>
            </div>
                          
            <div class="form-group">
                <label for="galderaText" class="control-label col-xs-5">Egin galdera :</label>
                <div class="col-xs-5">
                    <textarea id="galderaText" name="galderaText"  type="text" class="form-control" placeholder="Idatzi hemen zure galdera..." rows="4" ></textarea>
                </div>
            </div>
            
            
            <div class="form-group">
                <label for="erantzunText" class="control-label col-xs-5">Erantzun zuzena :</label>
                <div class="col-xs-5">
                    <textarea id="erantzunText" name="erantzunText"  type="text" class="form-control" placeholder="Idatzi hemen erantzun zuzena..." rows="4" ></textarea>
                </div>
            </div>
            
           <div class="form-group">
                <label for="zailtasuna" class="control-label col-xs-5">Zailtasuna :</label>
                <div class="col-xs-5">
                    <select class="form-control" name="zailtasuna" id="zailtasuna">
                    	<option value="hutsa"></option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                        <option value=4>4</option>
                        <option value=5>5</option> 
                    </select>
                 </div>
            </div>
			
            <button type="submit" class="btn btn-success"><?php if($editatu=="bai"){echo "Editatu";}else{echo "Galdetu";}	?></button>   
         
        </form>
	    

    	<script type="text/javascript">
	    function egiaztatu(editatu){
	 	var gai = document.getElementById("gaia").value;
	 	if (gai == null || gai == "") {
	 		alert("Gaira ezin da hutsik egon");
	 		return false;
	 	}
		var gald = document.getElementById("galderaText").value;
	 	if (gald == null || gald == "") {
	 		alert("Galdera ezin da hutsik egon");
	 		return false;
	 	}
		var eran = document.getElementById("erantzunText").value;
	 	if (eran == null || eran == "") {
	 		alert("Erantzuna ezin da hutsik egon");
	 		return false;
	 	}
	 }
	 </script>
	
 
    </body>
</html>

