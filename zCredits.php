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
                        <li><a href="zIndex.php">Home </a></li>
                        <li><a href="zseeXMLQuenstions.php">Quizzes </a></li>
                        <li class="active"><a href="zCredits.php">Credits <span class="sr-only">(current)</span></a></li>      
                    </ul>                   
                     <ul class="nav navbar-nav navbar-right">
                        <?php
                            session_start();
                            include 'navbar.php';
                         ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </head>
    
    <body>
   <div class="container-fluid">
   
       <section class="main" id="s1">
    <div>
    <h2 align = CENTER> Credits </h2>
    <br/>
    <h4 align = CENTER> Oihan Arroyo </h4>
	<h5 align = CENTER> Software Ingenieritza </h5>
	<br/>
	<div align="CENTER"> <IMG SRC="img/avatarO.png" width="200" height="200" />
	</div>
	<h4 align = CENTER> Julen Aristondo </h4>
	<h5 align = CENTER> Software Ingenieritza </h5>
	<br/>
	<div align="CENTER"> <IMG SRC="img/avatarJ.png" width="200" height="200" />
	</div>
	</div>
    </section>
   </div>
   
   
   		<?php 
			include 'signUp.php';
		?>

    </body>
</html>