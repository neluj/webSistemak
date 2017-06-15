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
                            	 
                            	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ) 
                            	{
									if(( $_SESSION['ErabiltzaileMota']=='IRAKASLEA')){
										header('Location: reviewingQuizes.php');
									}else{
                            	
                                       echo '<li class="dropdown">';
                                       echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">', $_SESSION['username'], '<span class="caret"></span></a>';
                                       echo '<ul class="dropdown-menu">';
                                       echo   '<li><a href=zhandlingQuizes.php>My Quizzes</a></li>';
                                       echo   '<li><a href=zInsertQuestion.php>New Quizz</a></li>';
                                       echo   '<li role="separator" class="divider"></li>';
                                       echo   '<li><a href=zLogout.php>LogOut</a></li>';
                                       echo  '</ul>';
                                       echo    '</li>';
									}
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
    
    
    	<input type="button" id="galderakIkusi" class="btn btn-success"  href="#" value="Galderak ikusi"/>
		<div id="editatuDiv" class="container">
		</div>

    <script src="https://code.jquery.com/jquery-2.2.4.js">	</script>
	 <script>
		$(document).ready(function(){
			$("#galderakIkusi").on("click", function(e){
				e.preventDefault();
				$("#editatuDiv").load("zureGalderakIkusi.php");
			});
		});	
	</script>
	

	

    </body>
</html>