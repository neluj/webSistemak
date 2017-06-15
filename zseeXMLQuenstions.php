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
                        <li class="active"><a href="zseeXMLQuenstions.php">Quizzes <span class="sr-only">(current)</span></a></li>   
                        <li><a href="zCredits.php">Credits</a></li>  
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
         <body>

        <div class="container-fluid">
            <?php	
            		$xslDoc = new DOMDocument();
            	$xslDoc->load('galderakErakutsi.xsl');
            	$xmlDoc = new DOMDocument();
            	$xmlDoc->load('galderak.xml');
            	$proc = new XSLTProcessor();
            	$proc->importStylesheet($xslDoc);
            	echo $proc->transformToXML($xmlDoc);
            ?>
          </div>        
             <?php 
				include 'signUp.php';
			?>
    </body>
</html>